<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    >
  <channel>
    <title>Bloga message</title>
    <atom:link href="http://localhost/CodeIgniter_2.1.0/bloga/feed" rel="self" type="application/rss+xml" />
    <link>http://localhost/CodeIgniter_2.1.0/</link>
    <description>Bloga description</description>
   <!-- <lastBuildDate>Sat, 14 Apr 2012 11:04:57 +0000</lastBuildDate>-->
    <language>es</language>
    <sy:updatePeriod>hourly</sy:updatePeriod>
    <sy:updateFrequency>1</sy:updateFrequency>
    <?php foreach ($blogak as $bloga) { ?>
    <item> 
       <title><?php echo $bloga->izenburua ?></title>
       <link>http:/localhost/CodeIgniter_2.1.0/bloga/<?php echo $bloga->id ?></link>  
       <description><?php echo $bloga->edukia ?></description>
    </item> 
    <?php } ?>
  </channel>
</rss>