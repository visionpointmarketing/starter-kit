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
      <div id="form-403">

<!-- START: Error Form -->

        <a name="page-content"></a>
        <br>
        <p>
          <strong>The page you are looking for has restricted access.</strong><br>
        </p>
        <p>
          Faculty and Staff that wish to access this website from off-campus will need to install and run VPN software available from the <a href="http://itservices.uncc.edu/faculty-staff-services/remote-services/vpn">ITS 
Website</a>.
        </p>
	<p>
	  The login page is <a id="user-href" href="/user">here</a>.
	</p>
        <noscript>
          <p>
            <p style="margin-bottom: 5px;">Links to other login pages:</p>
            <ul style="font-size: 12px;">
              <li>education.uncc.edu:
                <ul>
                  <li><a href="https://education.uncc.edu/assessment/user">https://education.uncc.edu/assessment/user</a></li>
                  <li><a href="https://education.uncc.edu/ceme/user">https://education.uncc.edu/ceme/user</a></li>
                  <li><a href="https://education.uncc.edu/circles/user">https://education.uncc.edu/circles/user</a></li>
                  <li><a href="https://education.uncc.edu/cstem/user">https://education.uncc.edu/cstem/user</a></li>
                  <li><a href="https://education.uncc.edu/freedomschool/user">https://education.uncc.edu/freedomschool/user</a></li>
                  <li><a href="https://education.uncc.edu/oeo/user">https://education.uncc.edu/oeo/user</a></li>
                  <li><a href="https://education.uncc.edu/pds/user">https://education.uncc.edu/pds/user</a></li>
                  <li><a href="https://education.uncc.edu/playtherapy/user">https://education.uncc.edu/playtherapy/user</a></li>
                  <li><a href="https://education.uncc.edu/tfellows/user">https://education.uncc.edu/tfellows/user</a></li>
                </ul>
              </li>
              <li>itservices.uncc.edu:
                <ul>
                  <li><a href="https://itservices.uncc.edu/facultystaff-services/user">https://itservices.uncc.edu/facultystaff-services/user</a></li>
                  <li><a href="https://itservices.uncc.edu/student-services/user">https://itservices.uncc.edu/student-services/user</a></li>
                </ul>
              </li>
              <li>provost.uncc.edu:
                <ul>
                  <li><a href="https://provost.uncc.edu/academics/user">https://provost.uncc.edu/academics/user</a></li>
                  <li><a href="https://provost.uncc.edu/epa/user">https://provost.uncc.edu/epa/user</a></li>
                  <li><a href="https://provost.uncc.edu/new-faculty/user">https://provost.uncc.edu/new-faculty/user</a></li>
                  <li><a href="https://provost.uncc.edu/phased-retirement/user">https://provost.uncc.edu/phased-retirement/user</a></li>
                </ul>
              </li>
            </ul>
          </p>
        </noscript>
        <p>
          If you have any other questions about this error, please feel free to contact the <a href="mailto:marketing@uncc.edu?subject=Access Denied (403)">Marketing Department</a>.
        </p>
      


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

 
