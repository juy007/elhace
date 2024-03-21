$(document).ready(function(){
        if (fullurl== baseurl+'admin-dashboard') {
            document.querySelector('#menu_dashboard').classList.add('active');

        }else if (fullurl== baseurl+'admin-news' || fullurl== baseurl+'admin-news-form' || fullurl== baseurl+'admin-news-edit/$id') {
            document.querySelector('#menu_news').classList.add('open');
            document.querySelector('#menu_list_news').classList.add('active');;

        }else if (fullurl== baseurl+'admin-news-category') {
            document.querySelector('#menu_news').classList.add('open');
            document.querySelector('#menu_category_news').classList.add('active');

        




        }else if (fullurl== baseurl+'admin-portfolio' || fullurl== baseurl+'admin-portfolio-form') {
            document.querySelector('#menu_portfolio').classList.add('open');
            document.querySelector('#menu_list_portfolio').classList.add('active');

        }else if (fullurl== baseurl+'admin-portfolio-category') {
            document.querySelector('#menu_portfolio').classList.add('open');
            document.querySelector('#menu_category_portfolio').classList.add('active');

        }else if (fullurl== baseurl+'admin-logo') {
            document.querySelector('#menu_logo').classList.add('active');
            document.querySelector('#menu_appreance').classList.add('open');

        }else if (fullurl== baseurl+'admin-footer') {
            document.querySelector('#menu_footer').classList.add('active');
            document.querySelector('#menu_appreance').classList.add('open');

        }else if (fullurl== baseurl+'admin-meta') {
            document.querySelector('#menu_meta').classList.add('active');
            document.querySelector('#menu_website').classList.add('open');

        }else if (fullurl== baseurl+'admin-social-media') {
            document.querySelector('#menu_social_media').classList.add('active');
            document.querySelector('#menu_website').classList.add('open');
            
        }else if (fullurl== baseurl+'admin-embed-map') {
            document.querySelector('#menu_embed_map').classList.add('active');
            document.querySelector('#menu_website').classList.add('open');
        }
    });