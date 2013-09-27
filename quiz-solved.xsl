<?xml version="1.0" encoding="UTF-8"?>
<!-- Edited by XMLSpy® -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <head>
  	<link rel="stylesheet" href="./css/quiz.css" media="screen"/>
  </head>
  <body>
  <h1>Exámen</h1>
  
  	<form method="post" action="">
		  <xsl:for-each select="quiz/question">
		  
		  <div class="question">
		  	<!--<xsl:if test="@type='category'">
				<h2><xsl:value-of select="category"/></h2>
			</xsl:if>-->
			
			
			<xsl:if test="@type='multichoice' or @type='calculated'">
				
				<!--<h3><xsl:value-of select="name"/></h3>-->
				
					<strong><xsl:apply-templates select="questiontext" /></strong>
					
					<xsl:apply-templates select="instructions" />
				
				<ol>
					<xsl:apply-templates select="answer" />
				</ol>
				
			</xsl:if>	  	
		  	
		  </div>
		
		  </xsl:for-each>
		  
		  <input type="submit" value="Corregir exámen" />
		  
  	</form>
  </body>
  </html>
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
	</xsl:if>
</xsl:template>

<xsl:template match="answer">
	<li>
		<xsl:choose>
			<xsl:when test="@format='html'">
				<!-- Hay que expandir el html -->
				<xsl:if test="@fraction &lt; 0">
					<div>
						<xsl:copy>
			            	<input type="radio" name="{../name/text}" value="{./text}"/> <label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
						</xsl:copy>
						
						<xsl:if test="./feedback/*[string-length(text()) &gt;0]!=''" >
							<div class="feedback">
								<xsl:copy>
				            		<xsl:value-of select="./feedback" disable-output-escaping="yes" />
								</xsl:copy>
							</div>
						</xsl:if>
					</div>
				</xsl:if>
				<xsl:if test="@fraction &gt; 0">
					<div class="correct">
		
						<xsl:copy>
				            <input type="radio" name="{../name/text}" value="{./text}"/><label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
							</xsl:copy>
		
						<xsl:if test="/*/feedback/*[string-length(text()) &gt;0]!=''" >
							<div class="feedback">
								<xsl:copy>
				            		<xsl:value-of select="./feedback" disable-output-escaping="yes" />
								</xsl:copy>	
							</div>
						</xsl:if>					
					</div>
				</xsl:if>	
			</xsl:when>
			<xsl:otherwise>
				<input type="radio" name="{../name/text}" value="{./text}"/><label><xsl:value-of select="./text" disable-output-escaping="yes" /></label>
			</xsl:otherwise>
		</xsl:choose>
	</li>
</xsl:template>

</xsl:stylesheet>