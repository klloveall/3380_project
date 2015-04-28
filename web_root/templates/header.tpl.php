<html>
    <head>
        <link rel="stylesheet" href="http://www.uh.edu/css/main.css" />
        <link rel="stylesheet" href="http://www.uh.edu/saits/css/override.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="<?= $_TEMPLATES['root_path'] ?>css/override.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://www.uh.edu/js/modernizr.js"></script>

        <script>
            $(function () {
                $("input[type='date']").datepicker();
            });
        </script>
        <title>UC Games Room | University of Houston</title>
    </head>

    <body>
        <div>
            <header role="banner" class="no-primary">
                <div class="top-bar">

                    <nav class="container">
                        <ul>
                            <li>
                                <a class="btn btn-primary uh-home" href="http://www.uh.edu">UH Home<span class="caret"></span></a>
                                <ul class="uh-home-nav">
                                    <li>
                                        <a href="http://www.uh.edu/about/">About<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/about/uh-glance/">UH at a Glance</a></li>
                                            <li><a href="http://www.uh.edu/about/history/">Our History &amp; Traditions</a></li>
                                            <li><a href="http://www.uh.edu/about/campus/">Our Campus</a></li>
                                            <li><a href="http://www.uh.edu/about/leadership/">Leadership</a></li>
                                            <li><a href="http://www.uh.edu/about/community/">UH in the Community</a></li>
                                            <li><a href="http://www.uh.edu/about/offices/">University Offices</a></li>
                                            <li><a href="http://www.uh.edu/about/uh-system/">The UH System</a></li>
                                            <li><a href="http://www.uh.edu/about/initiatives/">Strategic Initiatives</a></li>
                                            <li><a href="http://www.uh.edu/about/mission/">Our Mission Statement</a></li>
                                            <li><a href="http://www.uh.edu/about/houston/">About Houston</a></li>
                                            <li><a href="http://www.uh.edu/about/tier-one/">Tier One</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/academics/">Academics<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/academics/majors-minors/">Majors &amp; Minors</a></li>
                                            <li>
                                                <a href="javascript:void(0)">Colleges</a><span class="caret"></span>
                                                <ul class="children grandchildren">
                                                    <li><a href="http://www.uh.edu/academics/colleges-departments/">All Colleges &amp; Departments</a></li>
                                                    <li><a href="http://www.arch.uh.edu/">Architecture</a></li>
                                                    <li><a href="http://www.bauer.uh.edu">Business</a></li>
                                                    <li><a href="http://www.coe.uh.edu">Education</a></li>
                                                    <li><a href="http://egr.uh.edu/">Engineering</a></li>
                                                    <li><a href="http://www.uh.edu/honors/">Honors</a></li>
                                                    <li><a href="http://www.hrm.uh.edu/">Hotel &amp; Restaurant Management</a></li>
                                                    <li><a href="http://www.law.uh.edu/">Law</a></li>
                                                    <li><a href="http://www.class.uh.edu/">Liberal Arts &amp; Social Sciences</a></li>
                                                    <li><a href="http://nsm.uh.edu/">Natural Sciences &amp; Mathematics</a></li>
                                                    <li><a href="http://www.opt.uh.edu/">Optometry</a></li>
                                                    <li><a href="http://pharmacy.uh.edu/">Pharmacy</a></li>
                                                    <li><a href="http://www.sw.uh.edu/">Social Work</a></li>
                                                    <li><a href="http://www.tech.uh.edu/">Technology</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="http://www.uh.edu/academics/graduate-programs/">Graduate &amp; Professional Programs</a></li>
                                            <li><a href="http://www.uh.edu/academics/faculty/">UH Faculty</a></li>
                                            <li><a href="http://www.uh.edu/academics/libraries/">Libraries &amp; Learning Resources</a></li>
                                            <li><a href="http://www.uh.edu/catalog/">Course Catalogs</a></li>
                                            <li><a href="http://www.uh.edu/academics/courses-enrollment/">Courses &amp; Enrollment</a></li>
                                            <li><a href="http://distance.uh.edu/">Distance Education</a></li>
                                            <li><a href="http://www.uh.edu/academics/catalog/academic-calendar/">Academic Calendar</a></li>
                                            <li><a href="http://www.uh.edu/academics/forms/">Academic Forms</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/admissions/">Admissions<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/admissions/apply/index">Undergraduate Admissions</a></li>
                                            <li><a href="http://www.uh.edu/admissions/apply/graduate/index">Graduate Admissions</a></li>
                                            <li><a href="http://www.uh.edu/admissions/apply/international/index">International Admissions</a></li>
                                            <li><a href="http://www.uh.edu/financial/index">Costs &amp; Financial Aid</a></li>
                                            <li><a href="http://www.uh.edu/financial/undergraduate/types-aid/scholarships/">Scholarships</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/student-life/">Student Life<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/student-life/welcome-back">Welcome Back</a></li>
                                            <li><a href="http://www.uh.edu/housing/">Housing</a></li>
                                            <li><a href="http://www.uh.edu/student-life/dining/">Dining</a></li>
                                            <li><a href="http://www.uh.edu/student-life/student-activities/">Student Activities</a></li>
                                            <li><a href="http://uhcougars.cbscollegestore.com/store.cfm?store_id=470">Cougar Merchandise</a></li>
                                            <li><a href="http://www.uh.edu/student-life/recreation-athletics/">Recreation &amp; Athletics</a></li>
                                            <li><a href="http://www.uh.edu/student-life/parking-transport/">Parking &amp; Transportation</a></li>
                                            <li><a href="http://www.uh.edu/student-life/resources/">Student Resources</a></li>
                                            <li><a href="http://www.uh.edu/student-life/career-services/">Career Services</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/research/">Research<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/research/libraries/">Libraries</a></li>
                                            <li><a href="http://www.uh.edu/academics/colleges-departments/">Colleges &amp; Departments</a></li>
                                            <li><a href="http://www.uh.edu/research/clusters/">Research Clusters</a></li>
                                            <li><a href="http://www.uh.edu/research/labs-center/">Research Labs &amp; Centers</a></li>
                                            <li><a href="http://www.research.uh.edu/">Division of Research</a></li>
                                            <li><a href="http://www.uh.edu/honors/undergraduate-research/">Undergraduate Research</a></li>
                                            <li><a href="http://www.uh.edu/discovery/">Discovery</a></li>
                                            <li><a href="http://www.uh.edu/writecen/">Writing Center</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/athletics/">Athletics<span class="caret"></span></a>
                                        <ul class="children">                                    <li><a href="http://www.uhcougars.com/">Cougar Athletics Home</a></li>
                                            <li><a href="http://www.uh.edu/recreation/intramural_sports/index.html">Intramural Sports </a></li>
                                            <li><a href="http://www.uh.edu/recreation/sport_clubs/index.html">Sport Clubs </a></li>
                                            <li><a href="http://www.uh.edu/recreation/">Campus Recreation </a></li>
                                            <li><a href="http://www.uh.edu/homecoming/">Homecoming </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/news-events/">News &amp; Events<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/news-events/">News Releases</a></li>
                                            <li><a href="http://www.uh.edu/news-events/emergency/emergency">Emergency Communications</a></li>
                                            <li><a href="http://www.uh.edu/calendar/">Calendars &amp; Events</a></li>
                                            <li><a href="http://www.uh.edu/news-events/campus-news/">Campus News</a></li>
                                            <li><a href="http://www.uh.edu/news-events/media-publications/">Media &amp; Publications</a></li>
                                            <li><a href="http://www.uh.edu/news-events/announcements/">Announcements</a></li>
                                            <li><a href="http://www.uh.edu/news-events/mailing-lists/">Mailing Lists &amp; Subscriptions</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="http://www.uh.edu/giving/">Giving to UH<span class="caret"></span></a>
                                        <ul class="children">
                                            <li><a href="http://www.uh.edu/giving/opportunities/">Giving Opportunities</a></li>
                                            <li><a href="http://www.uh.edu/giving/ways/">Ways to Give</a></li>
                                            <li><a href="http://www.uh.edu/giving/faq/">Giving FAQs</a></li>
                                            <li><a href="http://www.uh.edu/giving/recognition-and-thanks/">Recognition and Thanks</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="http://www.uh.edu/prospective-students/">Apply to UH</a></li>
                            <li><a href="http://www.uh.edu/students/">Students</a></li>
                            <li><a href="http://www.uh.edu/faculty-staff/">Faculty &amp; Staff</a></li>
                            <li><a href="http://www.uh.edu/alumni/">Alumni</a></li>
                            <li><a href="http://www.uh.edu/parents/">Parents</a></li>
                            <li><a href="http://www.uh.edu/visitors/">Visitors</a></li>
                        </ul>
                        <form action="http://www.uh.edu/search" method="get" class="search" role="search">
                            <fieldset>
                                <input id="q" name="q" class="text" type="text" placeholder="Search" title="Search" />
                                <input class="submit" type="submit" value="Search" />
                            </fieldset>
                        </form>
                    </nav> </div>

                <div class="container">
                    <div class="logo college-logo">
                        <a href="http://www.uh.edu/dsa/"><img src="http://www.uh.edu/saits/images/student_affairs.png"/></a>
                        <h1 class="visuallyhidden">Division of Student Affairs</h1>
                    </div>

                    <nav class="nav-primary" role="navigation">
                        <ul class="parents">

                            <li><a href="/tracker/index.php">Home</a></li>
<!--                            <li><a href="/tracker/admin/bowlers/view_bowlers.php">Bowlers <span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/bowlers/add_bowler.php">Add New Bowler</a></li>
                                    <li><a href="/tracker/admin/bowlers/view_bowler.php">View Bowlers</a></li>
                                    <li><a href="/tracker/admin/bowlers/edit_bowler.php">Edit Bowlers</a></li>
                                </ul>
                            </li>-->
                            <li><a href="/tracker/admin/oil_patterns/view_oil_pattern.php">Oil Patterns <span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/oil_patterns/add_oil_pattern.php">Add Oil Pattern</a></li>
                                    <li><a href="/tracker/admin/oil_patterns/view_oil_pattern.php">View Oil Pattern</a></li>
                                    <li><a href="/tracker/admin/oil_patterns/edit_oil_pattern.php">Edit Oil Pattern</a></li>
                                </ul>
                            </li>
                            <li><a href="/tracker/admin/bowling_centers/view_bowling_center.php">Bowling Centers<span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/bowling_centers/add_bowling_center.php">Add Bowling Centers</a></li>
                                    <li><a href="/tracker/admin/bowling_centers/view_bowling_center.php">View Bowling Centers</a></li>
                                    <li><a href="/tracker/admin/bowling_centers/edit_bowling_center.php">Edit Bowling Centers</a></li>
                                </ul>
                            </li>
                            <li><a href="/tracker/admin/bowling_teams/view_team.php">Teams<span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/bowling_teams/add_team.php">Add Teams</a></li>
                                    <li><a href="/tracker/admin/bowling_teams/view_team.php">View Teams</a></li>
                                    <li><a href="/tracker/admin/bowling_teams/edit_team.php">Edit Teams</a></li>
                                </ul>
                            </li>
                            <li><a href="/tracker/admin/events/view_event.php">Events<span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/events/add_event.php">Add Event</a></li>
                                    <li><a href="/tracker/admin/events/view_event.php">View Event</a></li>
                                    <li><a href="/tracker/admin/events/edit_event.php">Edit Event</a></li>
                                </ul>
                            </li>
                             <li><a href="/tracker/admin/upload_scores/upload_scores.php">Upload Scores<span class="caret"></span></a>

                            <li><a href="/tracker/admin/balls/view_ball.php">Balls<span class="caret"></span></a>
                                <ul class="children">
                                    <li><a href="/tracker/admin/balls/add_ball.php">Add Ball</a></li>
                                    <li><a href="/tracker/admin/balls/view_ball.php">View Ball</a></li>
                                    <li><a href="/tracker/admin/balls/edit_ball.php">Edit Ball</a></li>
                                </ul>
                            </li>
                            <li><a href="/tracker/admin/bowlers/stats.php">View Stats</a></li>
                            <li><a href="/tracker/javascript/javascriptbowlingscore/BowlingPage.php">Live Add Games</a></li>
                        </ul>
                    </nav>
                    <span class="dept">Cougar Bowling Club & Team</span>
                </div>
            </header>


            <div role="main">
                <div class="container">
                    <? if (isset($_TEMPLATES['vars']['success'])): ?>
                    <div class="success"><?= $_TEMPLATES['vars']['success'] ?></div>
                    <? endif ?>
                    <? if (isset($_TEMPLATES['vars']['error'])): ?>
                    <div class="error"><?= $_TEMPLATES['vars']['error'] ?></div>
                    <? endif ?>