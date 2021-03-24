jQuery(document).ready(function() {

    /*
     *   Examples - images
     */

    jQuery("a#example1").fancybox({
        'titleShow': false
    });

    jQuery("a#example2").fancybox({
        'titleShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'easingIn': 'easeOutBack',
        'easingOut': 'easeInBack'
    });

    jQuery("a#example3").fancybox({
        'titleShow': false,
        'transitionIn': 'none',
        'transitionOut': 'none'
    });

    jQuery("a#example4").fancybox();

    jQuery("a#example5").fancybox({
        'titlePosition': 'inside'
    });

    jQuery("a#example6").fancybox({
        'titlePosition': 'over'
    });

    jQuery("a[rel=example_group]").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'titlePosition': 'over',
        'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
        }
    });

    /*
     *   Examples - various
     */

    jQuery(".various").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none'
    });

    jQuery("#various1").fancybox({
        'titlePosition': 'inside',
        'transitionIn': 'none',
        'transitionOut': 'none'
    });

    jQuery("#various2").fancybox({
        'modal': true
    });

    jQuery("#various3").fancybox({
        ajax: {
            type: "POST",
            data: 'mydata=test'
        }
    });

    jQuery("#various4").fancybox({
        ajax: {
            type: "POST"
        }
    });

    jQuery("#various5").fancybox({
        'width': '75%',
        'height': '75%',
        'autoScale': false,
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe'
    });

    jQuery("#various6").fancybox({
        'padding': 0,
        'autoScale': false,
        'transitionIn': 'none',
        'transitionOut': 'none'
    });

    jQuery("#various7").fancybox({
        onStart: function() {
            return window.confirm('Continue?');
        },
        onCancel: function() {
            alert('Canceled!');
        },
        onComplete: function() {
            alert('Completed!');
        },
        onCleanup: function() {
            return window.confirm('Close?');
        },
        onClosed: function() {
            alert('Closed!');
        }
    });

    jQuery("#various8, #various9").fancybox();

    /*
     *   Examples - manual call
     */

    jQuery("#manual1").click(function() {
        jQuery.fancybox({
            //'orig'			: jQuery(this),
            'padding': 0,
            'href': 'http://farm9.staticflickr.com/8568/16388772452_f4d77a92c7_b.jpg',
            'title': 'Lorem ipsum dolor sit amet',
            'transitionIn': 'elastic',
            'transitionOut': 'elastic'
        });
    });

    jQuery("#manual2").click(function() {
        jQuery.fancybox([
            'http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg',
            'http://farm3.staticflickr.com/2880/10346743894_0cfda8ff7a_b.jpg',
            {
                'href': 'http://farm6.staticflickr.com/5612/15344856989_449794889d_b.jpg',
                'title': 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            }
        ], {
            'padding': 0,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'image',
            'changeFade': 0
        });
    });

    /*
     *   Tips & Tricks
     */

    jQuery("#tip3").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'titlePosition': 'over',
        'onComplete': function() {
            jQuery("#fancybox-wrap").hover(function() {
                jQuery("#fancybox-title").show();
            }, function() {
                jQuery("#fancybox-title").hide();
            });
        }
    });

    jQuery("#tip4").click(function() {
        jQuery.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 680,
            'height': 495,
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });

        return false;
    });

    jQuery("#tip5").fancybox({
        'scrolling': 'no',
        'titleShow': false,
        'onClosed': function() {
            jQuery("#login_error").hide();
        }
    });

    jQuery("#login_form").bind("submit", function() {

        if (jQuery("#login_name").val().length < 1 || jQuery("#login_pass").val().length < 1) {
            jQuery("#login_error").show();
            jQuery.fancybox.resize();
            return false;
        }

        jQuery.fancybox.showActivity();

        jQuery.ajax({
            type: "POST",
            cache: false,
            url: "/data/login.php",
            data: jQuery(this).serializeArray(),
            success: function(data) {
                jQuery.fancybox(data);
            }
        });

        return false;
    });

    jQuery("#tip6").fancybox({
        'transitionIn': 'none',
        'transitionOut': 'none',
        'autoScale': false,
        'type': 'iframe',
        'width': 500,
        'height': 500,
        'scrolling': 'no'
    });

    function formatTitle(title, currentArray, currentIndex, currentOpts) {
        return '<div id="tip7-title"><span><a href="javascript:;" onclick="jQuery.fancybox.close();"><img src="/data/closelabel.gif" /></a></span>' + (title && title.length ? '<b>' + title + '</b>' : '') + 'Image ' + (currentIndex + 1) + ' of ' + currentArray.length + '</div>';
    }

    jQuery(".tip7").fancybox({
        'showCloseButton': false,
        'titlePosition': 'inside',
        'titleFormat': formatTitle
    });

    // Next JS snippets are only for fancybox.net

    /*
     *   Donate link
     */
    jQuery("a#donate").bind("click", function() {
        jQuery("#donate_form").submit();
        return false;
    });

    /*
     *   Zebra-stripping table
     */

    jQuery("table.options tr:even").addClass('even');

});