<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SolidBootstrap
 */

get_header(); ?>
<section class="container flex-container">
    <div class="resume">
        <div class="header">
            <h1>Daniel D. Yim</h1>
            <div class="badges">
                <a href="https://twitter.com/danyim" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/danielyim" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="https://angel.co/danyim" target="_blank"><i class="fa fa-angellist"></i></a>
                <a href="https://stackoverflow.com/users/350951/danyim" target="_blank"><i class="fa fa-stack-overflow"></i></a>
                <a href="https://github.com/danyim" target="_blank"><i class="fa fa-github"></i></a>
                <a href="https://bitbucket.com/danyim" target="_blank"><i class="fa fa-bitbucket"></i></a>
            </div>
        </div>
        <section class="skills">
            <div class="heading"><h2>Skills</h2></div>
            <div class="split">
                <div>
                    <h3>Frameworks</h3>
                    <ul>
                        <li>React/Redux</li>
                        <li>AngularJS (1.5)</li>
                        <li>Node</li>
                        <li>Phoenix</li>
                        <li>ASP.NET MVC C#</li>
                    </ul>
                </div>
                <div>
                    <h3>Languages</h3>
                    <ul>
                        <li>Javascript (ES6)</li>
                        <li>HTML5/CSS3</li>
                        <li>C#</li>
                        <li>Elixir</li>
                        <li>Shell scripting</li>
                    </ul>
                </div>
                <div>
                    <h3>Tools</h3>
                    <ul>
                        <li>AWS</li>
                        <li>Azure</li>
                        <li>Babel</li>
                        <li>ESLint</li>
                        <li>git</li>
                    </ul>
                </div>
            </div>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p> -->
        </section>
        <section class="experience">
            <div class="heading"><h2>Experience</h2></div>
            <ul>
                <li>
                    <strong>Software Consultant</strong> - Pariveda Solutions, 2014-2016
                </li>
                <li>
                    <strong>Lead Developer</strong> - Mach Interview, 2013-2014
                </li>
                <li>
                    <strong>Developer III</strong> - AIG, 2011-2014
                </li>
                <li>
                    <strong>Student Programmer</strong> - Columbia Regional Geospatial Service Center, 2010-2011
                </li>
            </ul>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p> -->
        </section>
        <section class="education">
            <div class="heading"><h2>Education</h2></div>
            <p>B.S. in Computer Science with minor in Mathematics</p>
            <p><strong>Stephen F. Austin State University, 2007-2011</strong></p>
        </section>
    </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
