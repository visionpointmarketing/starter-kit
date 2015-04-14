<header>
  <div id="header-wrapper">
    <div class="container">
      <div id="header-row" class="row">
        <div id="logo-wrapper" class="span2">
          <?php if (!empty($logo)): ?>
            <a class="logo" href="http://www.uncc.edu/" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>
        </div> <!--/#logo-wrapper -->
        <?php if ($site_name): ?>
          <div id="branding" class="span7">
            <div id="site-name-wrapper">
              <div id="site-name">
                <?php if ($subbrand_text && $subbrand_link): ?>
                  <?php if ($title): ?>
                    <a class="site-title" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  <?php else:  /* Use h1 when the content title is empty */ ?>
                    <h1 id="site-name-title">
                      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                  <?php endif; ?>
                  <p id="subbrand-link" class="hidden-phone">
                    <a href="<?php print $subbrand_link; ?>" title="<?php print $subbrand_text; ?>"><?php print $subbrand_text; ?></a>
                  </p>
                <?php else: /* No subbrand given */ ?>
                  <?php if ($title): ?>
                    <a class="site-title no-subbrand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                  <?php else:  /* Use h1 when the content title is empty */ ?>
                    <h1 id="site-name-title">
                      <a class="site-title no-subbrand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                  <?php endif; ?>
                <?php endif; ?>
              </div> <!-- /#site-name -->
            </div> <!-- /#site-name-wrapper -->
          </div> <!-- /#branding -->
        <?php endif; ?>
        <div id="header-utility" class="span3 hidden-phone">
          <?php print $header_utility; ?>
        </div> <!--/#header-utility-->
      </div> <!--/#header-row -->
    </div> <!--/.container -->
  </div> <!--/#header-wrapper -->
</header>

<?php 
   /* Add alerts */
  require_once('alerts.inc.php');
  $alertMsg = getAlertBanner(RED_ALERT_RSS, '#fff', '#b22222');
  if ($alertMsg != "") { 
    print $alertMsg; }
?>
<div id="content-wrapper" class="page-404">
  <div id="content-container" class="container">
    <div class="row"><div class="span12">
      <div id="form-404">

<!-- START: Error Form -->
<strong>The Page you are looking for was not found.</strong>
<BR /><BR />
<img src="http://web.uncc.edu/sites/web.uncc.edu/files/media/search-icon.png" style="float: right; padding: 0 0 0 5px;" alt="404 Icon">
<BR /><BR />
Please try one of the following...
<BR /><BR />
<form name="report_error" method="post" action="https://web.uncc.edu/site/error/report">
  <ul>
    <li>Use the search in the upper right corner<p /></li>
    <li>Go to the <a href="http://www.uncc.edu/">University Home Page</a><p /></li>
    <li>Or, Report this ERROR to our admins:

      <style type="text/css">
        .mybutton {background-color: #00703C; color:#FFFFFF; height: 40px; cursor: pointer;}
        .mybutton:hover {background-color: red; color:#FFFFFF; }
      </style>

      <?php
        function CurrentPageURL() {
          if (isset($_SERVER['HTTPS'])) {
            $pageURL = $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
          }
          else {
            $pageURL = 'http://';
          }
          $pageURL .= $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
          return $pageURL;
        }
        $report_loc = CurrentPageURL();
        $report_ref = $_SERVER['HTTP_REFERER'];
      ?>
      <input name="loc" type="hidden" value="<?=htmlentities($report_loc)?>">
      <input name="ref" type="hidden" value="<?=htmlentities($report_ref)?>">
      <input name="error_type" type="hidden" value="404">
      <input type="submit" class="mybutton" value="Click here to Report this Error &raquo;">
    </li>
  </ul>
</form>
<!-- END: Error Form -->

      </div>
    </div></div><!--/.row--><!--/.span12-->
  </div> <!--/#content-container-->

  <div id="footer">
    <div id="footer-container" class="container">
      <div class="row">
        <div id="static-footer" class="span12">
          <div class="row hidden-phone">
            <div id="utility-bar" class="span12">
              <div class="row">
                <div id="footer-links" class="span9">
                  <ul>
                    <li><img style="margin-top: 7px;" alt="Small UNC Charlotte Crown Logo" src="/sites/all/themes/unc_charlotte/img/crown-small.png"></li>
                    <li><a title="Alerts and Advisories at UNC Charlotte" target="_blank" href="http://www.unccharlottealerts.com">Alerts</a></li>
                    <li><a title="Jobs at UNC Charlotte" href="https://jobs.uncc.edu">Jobs</a></li>
                    <li><a title="Make a gift to UNC Charlotte" href="http://www.uncc.edu/makeagift">Make a Gift</a></li>
                    <li><a title="Directions to UNC Charlotte" href="http://www.uncc.edu/directions">Maps / Directions</a></li>
                    <li><a title="View this page as text only" href="https://textonly.uncc.edu?1343005729">Text Only</a></li>
                    <li><img height="20" width="20" style="display: inline-block; margin: 7px 6px 0 0; vertical-align: middle;" title="" alt="accessibility icon" src="/sites/all/themes/unc_charlotte/img/accessibility-icon.png"><a style="vertical-align: top;" title="Accessibility resources at UNC Charlotte" href="http://www.uncc.edu/accessibility">Accessibility</a></li>
                  </ul>
                </div> <!--/#footer-links-->
                <div id="footer-search" class="span3">
                  <form action="http://search.uncc.edu/website/" method="get" id="utility-search" onsubmit="var searchbox = document.getElementById('utility-search-input'); if (searchbox.value == 'Search uncc.edu' || searchbox.value == '') { searchbox.value=''; searchbox.focus(); return false; }"><input type="image" src="/sites/all/themes/unc_charlotte/img/utility-edu-search-mag.png" id="utility-search-button"><input type="text" name="q" value="Search uncc.edu" size="25" maxlength="100" title="" onclick="if (this.value == 'Search uncc.edu') { this.value = ''; }" id="utility-search-input"></form>
                </div> <!--/#footer-search-->
              </div> <!--/.row-->
            </div> <!--#utility-bar -->
          </div> <!--/.row-->
          <div class="row">      
            <div id="footer-bottom" class="span12">
              <div class="row">
                <div id="footer-name" class="span6 hidden-phone">
                  <p style="font-weight: bold; text-transform: none !important; font-family: arial, helvetica, sans-serif !important; color: #00703c;">
                    <a style="color: #00703c;" title="www.uncc.edu" href="http://www.uncc.edu">The University of North Carolina at Charlotte</a>
                  </p>
                  <p style="font-size: 0.85em; line-height: 10px;">9201 University City Blvd, Charlotte, NC 28223-0001 <b>&middot;</b> 704-687-8622</p>
                  <p style="font-size: 0.85em; line-height: 10px;">&copy; 2012 UNC Charlotte | All Rights Reserved | <a style="text-decoration: underline;" title="" href="http://legal.uncc.edu/termsofuse">Terms of Use</a> | <a style="text-decoration: underline;" title="" href="http://legal.uncc.edu/policies">University Policies</a></p>
                </div> <!-- #footer-name -->
                <div id="footer-follow" class="span3 offset3">
                  <p id="social-title">Follow UNC Charlotte</p>
                  <div class="facebook social-icons"><a target="_blank" title="Facebook" href="http://www.facebook.com/UNCCharlotte"><img height="20" width="20" alt="Facebook" src="/sites/all/themes/unc_charlotte/img/1x1.gif"></a></div>
                  <div class="blog social-icons"><a target="_blank" title="Blogger" href="http://unccltnews.blogspot.com/"><img height="20" width="20" alt="Blogger" src="/sites/all/themes/unc_charlotte/img/1x1.gif"></a></div>
                  <div class="twitter social-icons"><a target="_blank" title="Twitter" href="http://twitter.com/UNCCharlotte"><img height="20" width="20" alt="Twitter" src="/sites/all/themes/unc_charlotte/img/1x1.gif"></a></div>
                  <div class="flickr social-icons"><a target="_blank" title="Flickr" href="http://www.flickr.com/photos/stakeyourclaim"><img height="20" width="20" alt="Flickr" src="/sites/all/themes/unc_charlotte/img/1x1.gif"></a></div>
                  <div class="youtube social-icons"><a target="_blank" title="YouTube" href="http://www.youtube.com/unccharlottevideo"><img height="20" width="20" alt="YouTube" src="/sites/all/themes/unc_charlotte/img/1x1.gif"></a></div>
                </div> <!-- #footer-follow -->
              </div> <!--/.row-->
            </div> <!-- #footer-bottom -->
          </div> <!--/.row-->
        </div> <!--/#static-footer -->
      </div> <!--/.row-->
    </div> <!--/#footer-container -->
  </div> <!--/#footer-->
</div> <!--/#content-wrapper -->
