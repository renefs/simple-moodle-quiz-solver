<?xml version="1.0" encoding="UTF-8"?>
<!-- Edited by XMLSpy® -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

		  <xsl:for-each select="quiz/question">
				
				<xsl:if test="@type='multichoice' or @type='calculated'">
					
						<strong><xsl:apply-templates select="questiontext" /></strong>
						
						<xsl:apply-templates select="instructions" />
					
						<ol>
							<xsl:apply-templates select="answer" />
						</ol>
					
				</xsl:if>	  	
		
		  </xsl:for-each>

</xsl:template>

<xsl:template match="instructions">
	<div style="color:red"><xsl:value-of select="./text" disable-output-escaping="yes" /></div>
</xsl:template>

<xsl:template match="questiontext">
	<xsl:if test="@format='html'">
		<!-- Hay que expandir el html -->
		<xsl:copy>
        	<xsl:value-of select="./text" disable-output-escaping="yes" />
		</xsl:copy>
		<input type="hidden" name="questiontext_{../name/text}" value="{./text}"/>
			
	</xsl:if>
</xsl:template>

<xsl:template match="answer">
	<li>
		<xsl:choose>
			<xsl:when test="@format='html'">
				<!-- Hay que expandir el html -->
				<xsl:if test="@fraction &lt; 0">
					
					<input type="hidden" name="fraction_{../name/text}_incorrect" value="{@fraction}"/>
						<xsl:copy>
			            	<input type="radio" name="select_{../name/text}" value="{./text}"/> <label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
						</xsl:copy>
				</xsl:if>
				
				<xsl:if test="@fraction &gt; 0">
				
						<input type="hidden" name="fraction_{../name/text}_correct" value="{@fraction}"/>
				
						<input type="hidden" name="correct_{../name/text}" value="{./text}"/>
						<xsl:copy>
				            <input type="radio" name="select_{../name/text}" value="{./text}"/><label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
						</xsl:copy>

				</xsl:if>	
			</xsl:when>
			<xsl:otherwise>
				<input type="radio" name="select_{../name/text}" value="{./text}"/><label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
			</xsl:otherwise>
		</xsl:choose>
		
	</li>
</xsl:template>

</xsl:stylesheet>