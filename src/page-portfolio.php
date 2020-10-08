<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package yimd
 */

get_header();?>
<section class="container flex-container">
    <div class="portfolio">
        <div class="portfolio-item">
            <figure style="background-image: url('http://daniely.im/wp-content/uploads/2016/08/indecks-1024x672.png');">
            </figure>
            <figcaption>
                <h4>
                    <a href="https://danyim.github.io/indecks/" target="_blank">indecks</a>
                    <a href="https://github.com/danyim/indecks" target="_blank"><i class="fa fa-github"></i></a>
                </h4>
                <p>Interactive index card deck organizer and study aid, built using React</p>
            </figcaption>
        </div>
        <div class="portfolio-item">
            <figure style="background-image: url('https://daniely.im/wp-content/uploads/2017/03/breaking-bao-1024x873.png');">
            </figure>
            <figcaption>
                <h4>
                    <a href="http://breakingbao.com/" target="_blank">Breaking Bao</a>
                    <a href="https://github.com/danyim/breaking-bao" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h4>
                <p>
                    Website for Houston's finest Asian-fusion buns, built using React.
                </p>
            </figcaption>
        </div>
        <div class="portfolio-item">
            <figure style="background-image: url('http://daniely.im/wp-content/uploads/2016/08/yotta-991x1024.png');">
            </figure>
            <figcaption>
                <h4>
                    <a href="https://yotta-url.herokuapp.com/" target="_blank">yotta-url</a>
                    <a href="https://github.com/danyim/yotta-url" target="_blank"><i class="fa fa-github"></i></a>
                </h4>
                <p>A URL expander microservice built in NodeJS</p>
            </figcaption>
        </div>

        <div class="portfolio-item">
            <figure style="background-image: url('https://daniely.im/wp-content/uploads/2017/03/artgorithms-1024x748.png');">
            </figure>
            <!-- <figure>
                <h4 class="ital">
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                    COMING SOON COMING SOON COMING SOON COMING SOON
                    <span class="grey">COMING SOON COMING SOON COMING SOON COMING SOON</span>
                </h4>
            </figure> -->
            <figcaption>
                <h4>
                    <a href="http://artgorithms.s3-website-us-west-2.amazonaws.com/" target="_blank">ARTGORITHMS</a>
                    <a href="https://github.com/danyim/artgorithms" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h4>
                <p>A design &amp; art project; minimalist paintings recreated in code. Made in React and Web Canvas API.</p>
            </figcaption>
        </div>
        <div class="portfolio-item">
            <figure style="background-image: url('http://daniely.im/wp-content/uploads/2016/08/cspeak-661x1024.png');">
            </figure>
            <figcaption>
                <h4>
                    <a href="http://jargon.daniely.im/" target="_blank">Consultant Speak</a>
                    <a href="https://github.com/danyim/ConsultantSpeak" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h4>
                <p>Random definitions of "consultant speak" built with an Angular, Node/Express, and MongoDB</p>
            </figcaption>
        </div>
        <div class="portfolio-item">
            <figure style="background-image: url('http://daniely.im/wp-content/uploads/2016/08/gerb-1024x691.png');">
            </figure>
            <figcaption>
                <h4>
                    <a href="https://gerbdawg.herokuapp.com/" target="_blank">gerb dawg</a>
                    <a href="https://github.com/danyim/gerbdawg" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h4>
                <p>Gerb or The Big Dawg--which are you? Made with love using Angular and Firebase</p>
            </figcaption>
        </div>
    </div>
</section>
<?php get_sidebar();?>
<?php get_footer();?>
