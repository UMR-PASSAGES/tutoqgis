<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:outline="http://wkhtmltopdf.org/outline"
                xmlns="http://www.w3.org/1999/xhtml">
  <xsl:output doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
              doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
              indent="yes" />
  <xsl:template match="outline:outline">
 
 <html>
 
      <head>
      	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      	
        <title>Sommaire</title>
        <style>
        	html{
        		margin:0;
				padding:0;
				color:#323232;
				background:#FFFFFF;	
				font-family:"Open Sans", helvetica, arial, verdana;
				font-size: 0.8em;
        	}
        	body{
				min-height: 100%;
				margin: 0;
				padding: 0;
				border: 0;
			}
			#wrap {
				width:17cm;
				position: relative;
				margin-left: auto;
		  		margin-right: auto;
			}
         	#titretoc {
	            text-align: center;
	            font-size: 2em;
	            color:#2DAB0B;
	        }
          	div {border-bottom: 1px dashed rgb(200,200,200);}
          	span {float: right;}
          	li {list-style: none;}
          	ul {
	            font-size: 15px;
	        }
          	ul ul {font-size: 90%; }
          	ul {padding-left: 0em;}
          	ul ul {padding-left: 1em;}
          	a {text-decoration:none; color: black;}
        </style>
      </head>
      
      <body>
      	<div id="wrap">
        	<div id="titretoc">Sommaire</div>
        	<ul><xsl:apply-templates select="outline:item/outline:item"/></ul>
        </div>
      </body>
      
  </html>
  
  </xsl:template>
  <xsl:template match="outline:item">
    <li>
      <xsl:if test="@title!=''">
        <div>
          <a>
            <xsl:if test="@link">
              <xsl:attribute name="href"><xsl:value-of select="@link"/></xsl:attribute>
            </xsl:if>
            <xsl:if test="@backLink">
              <xsl:attribute name="name"><xsl:value-of select="@backLink"/></xsl:attribute>
            </xsl:if>
            <xsl:value-of select="@title" /> 
          </a>
          <span> <xsl:value-of select="@page" /> </span>
        </div>
      </xsl:if>
      <ul>
        <xsl:comment>added to prevent self-closing tags in QtXmlPatterns</xsl:comment>
        <xsl:apply-templates select="outline:item"/>
      </ul>
    </li>
  </xsl:template>
</xsl:stylesheet>

