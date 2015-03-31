/**
 * 20 reasons theme js file
 */
twentyreasonstheme = {
    timedFunction: null,
    moreModulesCollapsed: true,
    groupsCollapsed: true,
    footerLineCollapsed: true,
    collapsed: new Array(),
    collapsedStatic: new Array(),
    selectedGroup: '',
    menuStore: {},
    menuItemsStore: {},
    openItemMenu: null,
    openingItemMenu: null,
    currentMenuItem: null,
    errorcount: 0,
    errorsdisplayed: false,
    cpdisplayed: false,
    currentEditedPage: null,
    toggleActivePage: function(activePage){
        window.location="index.php?module=Home&action=index&activePage=" + activePage;
    },
    addPage: function(){
        $('#pageEdit').insertBefore("#pageItem0");
        document.getElementById('pageTitle').value = 'new Page';
        document.getElementById('pageColumns').value = 2;
        document.getElementById('moduleTab_HomeMenu').style.display = 'none';
        document.getElementById('pageEdit').style.display = "block";
        twentyreasonstheme.currentEditedPage = 'new';
    },
    editPage: function(pageIndex){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=getPage&to_pdf=true&pageIndex=" + pageIndex,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
	                var pageItemObj = jQuery.parseJSON(result);
	                $('#pageEdit').insertAfter("#pageItem"+pageItemObj.index);
	                document.getElementById('pageTitle').value = pageItemObj.pageTitle;
	                document.getElementById('pageColumns').value = pageItemObj.numColumns;
	                // check if we can delete - item 0 cannot be deleted
	                if(pageItemObj.index == 0)
	                    document.getElementById('pageEditDeleteButton').style.display = 'none';
	                else
	                    document.getElementById('pageEditDeleteButton').style.display = 'inline';

	                document.getElementById('pageEdit').style.display = "block";
	                twentyreasonstheme.currentEditedPage = pageItemObj.index;
            	}
            }
        });
    },
    cancelPageEdit: function(){
        document.getElementById('pageEdit').style.display = "none";
        twentyreasonstheme.currentEditedPage = null;
    },
    commitPageEdit: function(){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setPage&to_pdf=true&pageIndex=" + twentyreasonstheme.currentEditedPage + "&pageTitle=" + document.getElementById('pageTitle').value + "&pageColumns=" + document.getElementById('pageColumns').value,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
            		window.location="index.php?module=Home&action=index&activePage=" + result;
            	}
            }
        });
    },
    deletePage: function(){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=deletePage&to_pdf=true&pageIndex=" + twentyreasonstheme.currentEditedPage + "&pageTitle=" + document.getElementById('pageTitle').value + "&pageColumns=" + document.getElementById('pageColumns').value,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
            		window.location="index.php?module=Home&action=index";
            	}
            }
        });
    },
    resetPages: function(){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=resetPages&to_pdf=true",
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
                	window.location="index.php?module=Home&action=index";
            	}
            }
        });
    },
    toggleFavorite: function(){
        if(document.getElementById('beanisfavorite').value == '0')
        {
            document.getElementById('beanisfavorite').value = '1';
            document.getElementById('iafavoriteinactive').style.display = 'none';
            document.getElementById('iafavoriteactive').style.display = 'block';
        }
        else
        {
            document.getElementById('beanisfavorite').value = '0';
            document.getElementById('iafavoriteinactive').style.display = 'block';
            document.getElementById('iafavoriteactive').style.display = 'none';
        }

        var form = document.getElementById('formDetailView');
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=toggleFavorite&to_pdf=true&favorite="+document.getElementById('beanisfavorite').value+"&beanid="+form.record.value+"&bean="+form.module.value,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}
            }
        });
    },
    toggleMoreModules: function(){
        if(this.moreModulesCollapsed)
        {
            document.getElementById("moreModuleItems").style.visibility = 'visible';
            this.moreModulesCollapsed = false;

            $('#MoreModules').mouseleave(function(){
                document.getElementById("moreModuleItems").style.visibility = 'hidden';
                twentyreasonstheme.moreModulesCollapsed = true;
            });
        }
        else
        {
            document.getElementById("moreModuleItems").style.visibility = 'hidden';
            this.moreModulesCollapsed = true;
        }
    },
    changeGroup: function(selectedGroup){

        if(!this.menuStore[document.getElementById("currentGroup").innerHTML])
        {
            this.menuStore[document.getElementById("currentGroup").innerHTML] = document.getElementById("newSubmenu").innerHTML;
        }

        document.getElementById("currentGroup").innerHTML = selectedGroup;

        //document.getElementById("newSubmenu").innerHTML = "<img src='themes/20reasons/images/ajax.gif'>";
        document.getElementById("newSubmenu").style.display= 'none';
        document.getElementById("newSubmenuloading").style.display= 'inline';


        if(this.menuStore[selectedGroup])
        {
            document.getElementById("newSubmenu").style.display= 'inline';
            document.getElementById("newSubmenuloading").style.display= 'none';
            document.getElementById("newSubmenu").innerHTML = this.menuStore[selectedGroup];
            $('.newsubmenuitem').mouseenter(function(e){
                twentyreasonstheme.triggerItemMenu(e.currentTarget.id.replace('tab', '').replace('moduleTab_', ''));
                twentyreasonstheme.openingItemMenu = e.currentTarget.id.replace('tab', '').replace('moduleTab_', '');
            });
            $('.newsubmenuitem').mouseleave(function(){
                $('#'+twentyreasonstheme.openItemMenu).remove();
                twentyreasonstheme.openItemMenu = null;
                twentyreasonstheme.openingItemMenu = null;
            });
        }
        else
        {
            $.ajax({
                url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=changeGroup&to_pdf=true&newGroup="+selectedGroup+"&currentModule="+document.getElementById("currentModule").innerHTML,
                success:function(result){
                	if(result.search('value="Login"') > -1){
                		////alert('You have been logged out !'+new Error().lineNumber);
                		twentyreasonstheme.displayLogin(result);
                	}else{
	                    document.getElementById("newSubmenu").style.display= 'inline';
	                    document.getElementById("newSubmenuloading").style.display= 'none';
	                    document.getElementById("newSubmenu").innerHTML = result;

	                    $('.newsubmenuitem').mouseenter(function(e){
	                        twentyreasonstheme.triggerItemMenu(e.currentTarget.id.replace('tab', '').replace('moduleTab_', ''));
	                        twentyreasonstheme.openingItemMenu = e.currentTarget.id.replace('tab', '').replace('moduleTab_', '');
	                    });
	                    $('.newsubmenuitem').mouseleave(function(){
	                        $('#'+twentyreasonstheme.openItemMenu).remove();
	                        twentyreasonstheme.openItemMenu = null;
	                        twentyreasonstheme.openingItemMenu = null;
	                    });
                	}
                }
            });
        }
    },
    toggleGroups: function(){
        if(this.groupsCollapsed)
        {

            document.getElementById("tabGroupDropDown").style.visibility = 'visible';
            this.groupsCollapsed = false;
            $('#groupdropdowntab').mouseleave(function(){
                document.getElementById("tabGroupDropDown").style.visibility = 'hidden';
                twentyreasonstheme.groupsCollapsed = true;
            });
        }
        else
        {
            document.getElementById("tabGroupDropDown").style.visibility = 'hidden';
            this.groupsCollapsed = true;
        }
    },
    removeItemMenu: function(item){
        if(this.openItemMenu && 1 == 2)
        {
            $('#'+this.openItemMenu).remove();
            this.openItemMenu = null;
        }
    },
    triggerRemoveItemMenu: function(item){
        if(this.openItemMenu && this.openItemMenu == 'moduleTab_'+item+'Menu')
            this.timedFunction = window.setTimeout("twentyreasonstheme.removeItemMenu('" + item + "')", 300);
    },
    cancelRemoveItemMenu: function(){
        if(this.timedFunction)
        {
            window.clearTimeout(this.timedFunction);
            this.timedFunction = null;
        }
    },
    displayItemMenu: function(item){

        if(this.currentMenuItem == item && $('.moduletabitemmenu').length == 0 && twentyreasonstheme.openingItemMenu == item)
        {
            var thisOffset = $("#" + item +'tab').offset();
            var newDiv = document.createElement('div');
            newDiv.id="moduleTab_" + item + "Menu";
            newDiv.className = 'moduletabitemmenu';
            newDiv.style.left = thisOffset.left + 'px';

            var resultObj = jQuery.parseJSON(twentyreasonstheme.menuItemsStore[item]);
            // newDiv.innerHTML = twentyreasonstheme.menuItemsStore[item];
            newDiv.innerHTML = resultObj.menu + resultObj.lastviewed + resultObj.favorites;

            document.getElementById(item+'tab').appendChild(newDiv);
            this.openItemMenu = newDiv.id;
            $('.newsubmenuitem').mouseleave(function(){
                $('#'+twentyreasonstheme.openItemMenu).remove();
                twentyreasonstheme.openItemMenu = null;
            });

        }
    },
    getItemMenu: function(item){
        if(!this.menuItemsStore[item])
        {
            $.ajax({
                url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=getMenu&to_pdf=true&activeModule="+currentModule+"&currentModule="+item,
                success:function(result){
                	if(result.search('value="Login"') > -1){
                		////alert('You have been logged out !'+new Error().lineNumber);
                		twentyreasonstheme.displayLogin(result);
                	}else{
	                	twentyreasonstheme.menuItemsStore[item] = result;
	                	twentyreasonstheme.displayItemMenu(item);
                	}
                }
            });
        }
        else
            twentyreasonstheme.displayItemMenu(item);
    },
    triggerItemMenu: function(item){
        this.timedFunction = window.setTimeout("twentyreasonstheme.getItemMenu('" + item + "')", 400);
        this.currentMenuItem = item;
    },
    cancelLoadItemMenu: function(item){
        if(this.timedFunction)
        {
            window.clearTimeout(this.timedFunction);
            this.timedFunction = null;
            this.currentMenuItem = null;
        };
        this.triggerRemoveItemMenu(item);
    },
    getErrorCount: function(){

        errorCountArray = document.getElementById("errormessages").innerHTML.match(/\<p class/g);
        if(errorCountArray)
        {
            this.errorcount = errorCountArray.length;
            document.getElementById("errorcount").innerHTML = errorCountArray.length;
            document.getElementById("errorcountli").style.display = 'inline';
        }
        if(document.getElementById("statistics") != null){
        	document.getElementById("statistics").innerHTML = document.getElementById("responseTime").innerHTML;
        }
    },
    closeCopyright: function(){
        document.getElementById('copyright').style.display = 'none';
        this.cpdisplayed = false;
    },
    displayCopyright: function(){
        if(this.cpdisplayed)
        {
            document.getElementById('copyright').style.display = 'none';
            this.cpdisplayed = false;
        }
        else
        {
            cprightpos = $(document.getElementById('poweredbysugarcrm')).offset();
            cprightpos.top = cprightpos.top - 210;
            cprightpos.left = cprightpos.left;
            $(document.getElementById('copyright')).css(cprightpos);
            document.getElementById('copyright').style.display = 'inline';
            this.cpdisplayed = true;
        //$(document.getElementById('copyright')).click(twentyreasonstheme.closeCopyright());
        }
    },
    displayErrors: function(){
        if(this.errorsdisplayed)
        {
            document.getElementById('errormessages').style.display = 'none';
            this.errorsdisplayed = false;
        }
        else
        {
            errorcountpos = $(document.getElementById('errorcount')).offset();
            errorcountpos.top = errorcountpos.top - (this.errorcount * 30 + 30);
            errorcountpos.left = errorcountpos.left;
            $(document.getElementById('errormessages')).css(errorcountpos);
            $(document.getElementById('errormessages')).css('height', 'auto' /*this.errorcount * 30*/);
            document.getElementById('errormessages').style.display = 'inline';
            this.errorsdisplayed = true;
        }
    //alert("displaying errors");
    },
    hideActionButtons: function(){
        // jquery is loaded since 6.5
        // document.getElementById('actionmenu').appendChild(document.getElementById('edit_button'));
        document.getElementById('actionmenu').appendChild(document.getElementById('SAVE_HEADER'));

    /*
			elements = $('.sugar_action_button');
			elements.each(function() {
				$(this).css("display","none");
				$(this).children('input').each(function(){
						$(this).appendTo('#actionmenu');});
				});
				*/
    },
    hijackActionMenu: function(){
        $('.SugarActionMenu').each(function(){
            var elements = $(this).children('li').children('ul').children('li');
            $(this).append(elements);
        // alert(elements.length);
        });
    },
    hijackModuleTitle: function(){
    	if(typeof action_sugar_grp1 != 'undefined'){
    		if(action_sugar_grp1 != 'DetailView')
    			$('#itemactions').css('display', 'none');
    	}else{
    		$('#itemactions').css('display', 'none');
    	}

        elements = $('.moduleTitle');
        if(elements.length > 0)
        {
        	$('#moduleTitleDummy').addClass('moduleTitle');
        	$('#moduleTitleDummy').show();
        	$('#moduleTitleDummy').html($(elements[0]).html());
        }
    },
    registerEvents: function(){
        //$('#copyright').blur(function(){alert('lost my focus')});
        $(document).click(function(e){
            if(e.target.id != 'copyright' && e.target.id != 'poweredbysugarcrm' && twentyreasonstheme.cpdisplayed )
            {
                document.getElementById('copyright').style.display = 'none';
                twentyreasonstheme.cpdisplayed = false;
            }
            if(e.target.id != 'errormessages' && e.target.parentNode.id != 'errormessages' && e.target.id != 'errorcount' && twentyreasonstheme.errorsdisplayed )
            {
                document.getElementById('errormessages').style.display = 'none';
                twentyreasonstheme.errorsdisplayed = false;
            }
        });
        $('.newsubmenuitem').mouseenter(function(e){

            twentyreasonstheme.triggerItemMenu(e.currentTarget.id.replace('tab', '').replace('moduleTab_', ''));
            twentyreasonstheme.openingItemMenu = e.currentTarget.id.replace('tab', '').replace('moduleTab_', '');
        });
        $('.newsubmenuitem').mouseleave(function(){
            $('#'+twentyreasonstheme.openItemMenu).remove();
            twentyreasonstheme.openItemMenu = null;
            twentyreasonstheme.openingItemMenu = null;
        });

        if(document.getElementById('iareminder') != null)
        {
            $('#iareminder').click(function(){
                $('#iareminderpicker').show();
            });
            $('#iaremindernew').click(function(){
                $('#iareminderpicker').show();
            });
            $('#iareminderremove').click(function(){
                twentyreasonstheme.removeReminder();
            });
        }

        /*
    	 * make the SideBar sortable
    	 */

        $('#TRSideBar').sortable({
            items: "div.shortcuts",
            distance: 15,
            axis: "y",
            opacity: 0.8,
            cursorAt: {
                left: 5
            },
            revert: true,
            update: function( event, ui ) {
                twentyreasonstheme.sortSave();
            }
        });
        $('#TRSideBar div.shortcuts span.shortcutstitle').css("cursor", "move");
        $('#TRSideBar').disableSelection();

        /**
    	 * make SubPanels tabbed id we are in DetailView and config is set to true
    	 */
        if(typeof action_sugar_grp1 != 'undefined'){
        	if(action_sugar_grp1 == 'DetailView' && subpanelsTabbed && $('#groupTabs').length == 0){
        		twentyreasonstheme.subpanelsTabbed();
        	}
        }
    },
    setDatepicker: function(){
    	if(typeof action_sugar_grp1 != 'undefined'){
	        if(document.getElementById('iareminderpicker') != null && action_sugar_grp1 == 'DetailView')
	        {
	            $('#iareminderpicker').datepicker({
	                dateFormat: cal_date_format.replace(/\%/g, '').replace('Y', 'yy'),
	                defaultDate: $('#iareminder').html(),
	                numberOfMonths: 2,
	                //defaultDate: '...',
	                onSelect: function(dateText, inst) {
	                    document.getElementById('iareminder').innerHTML = dateText;
                        var detailViewForm = document.getElementById('formDetailView');

	                    $.ajax({
	                        url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setReminder&to_pdf=true&reminderDate=" + dateText +"&beanId=" + detailViewForm.record.value + "&beanmodule=" + detailViewForm.module.value,
	                        success:function(result){
	                        	if(result.search('value="Login"') > -1){
	                        		////alert('You have been logged out !'+new Error().lineNumber);
	                        		twentyreasonstheme.displayLogin(result);
	                        	}else{
		                            $('#widget_cotent_Reminders').html(result);
		                            $('#combo_Reminders').html(result);
	                        	}
	                        }
	                    });
	                    $('#iareminderpicker').hide();
	                    $("#iareminderremove").css("display", "inline");
	                    $("#iaremindernew").css("display", "none");
	                }
	            }).hide();

	            // manage the remove or add image

	            if($('#iareminder').html() != '')
	                $("#iareminderremove").css("display", "inline");
	            else
	                $("#iaremindernew").css("display", "inline");

	        }
    	}
    },
    removeReminderById: function(beanid){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=removeReminder&to_pdf=true&beanId=" + beanid,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
	                $('#widget_cotent_Reminders').html(result);
	                $('#combo_Reminders').html(result);
            	}
            }
        });

        detailViewForm = document.getElementById('formDetailView');
        if(detailViewForm != undefined && detailViewForm.record.value == beanid)
        {
            $("#iareminderremove").css("display", "none");
            $("#iaremindernew").css("display", "inline");
            document.getElementById('iareminder').innerHTML = '';
        }
    },
    removeReminder: function(){
        // just to make sure the datepicker is hidden 
        $('#iareminderpicker').hide();
        detailViewForm = document.getElementById('formDetailView');
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=removeReminder&to_pdf=true&beanId=" + detailViewForm.record.value,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
	                $('#widget_cotent_Reminders').html(result);
	                $('#combo_Reminders').html(result);
            	}
            }
        });
        $("#iareminderremove").css("display", "none");
        $("#iaremindernew").css("display", "inline");
        document.getElementById('iareminder').innerHTML = '';
        $('#iareminderpicker').datepicker.defaultDate = '';

    },

    toggleFooterline: function(save, animated){
        if(this.footerLineCollapsedStatic || !save){
            if(animated == false){
                $('#footerline').css('width','100%');
                $('#expand_footerline span').removeClass('arrow_right');
                $('#expand_footerline span').addClass('arrow_left');
                $('#welcome_slide').removeAttr('style');
                twentyreasonstheme.getErrorCount();
            }else{
                $('#footerline').animate({
                    width: "100%"
                },1000);
                setTimeout(function(){
                    $('#expand_footerline span').removeClass('arrow_right');
                    $('#expand_footerline span').addClass('arrow_left');
                    $('#welcome_slide').fadeIn();
                    twentyreasonstheme.getErrorCount();
                },600);
            }

            this.footerLineCollapsed = false;
            if(save){
                this.footerLineCollapsedStatic = false;
                this.setToggleFooterline(false);
            }
        }else{
            $('#expand_footerline span').removeClass('arrow_left');
            $('#expand_footerline span').addClass('arrow_right');
            $('#welcome_slide').fadeOut();
            $('#footerline').animate({
                width: "165px"
            },1000);

            this.footerLineCollapsed = true;
            if(save){
                this.footerLineCollapsedStatic = true;
                this.setToggleFooterline(true);
            }
        }
    },
    toggleFooterline_mouseover: function(event){
        if(this.footerLineCollapsedStatic){
            if(event == 'mousein'){
                $('#footerline').animate({
                    width: "100%"
                },500);
                setTimeout(function(){
                    $('#welcome_slide').fadeIn();
                    // twentyreasonstheme.getErrorCount();
                },200);
                this.footerLineCollapsed = false;
            }else{
                $('#welcome_slide').fadeOut('fast');
                setTimeout(function(){
                    $('#footerline').animate({
                        width: "165px"
                    },500);
                },200);

                this.footerLineCollapsed = true;
            }
        }
    },
    setToggleFooterline: function(collapsed){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setToggleFooterline&to_pdf=true&footerLineCollapsed="+collapsed,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}
            }
        });
    },
    /*
     * Function to close or open an element from the SideBar
     */
    toggle: function(item,save, animated){
        if(this.collapsedStatic[item] || !save){
            if(load_closed == false && $('#'+item+' ul').length == 0 && save){
                $.ajax({
                    url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=refresh&widget="+item+"&to_pdf=true&currentModule="+currentModule,
                    success:function(result){
                    	if(result.search('value="Login"') > -1){
                    		////alert('You have been logged out !'+new Error().lineNumber);
                    		twentyreasonstheme.displayLogin(result);
                    	}else{
	                        result = jQuery.parseJSON(result);
	                        $('#'+item+' div.widget_content').append(result.content);
	                        if(result.jsinclude.length > 0 && $('head [src="'+result.jsinclude+'"]').length < 1){
	                            var snode = document.createElement('script');
	                            snode.setAttribute('type','text/javascript');
	                            snode.setAttribute('src',result.jsinclude);
	                            document.getElementsByTagName('head')[0].appendChild(snode);
	                        }
	                        if(result.jsexecute.length > 0){
	                            eval(result.jsexecute);
	                        }
                    	}
                    }
                });
            }
            if(animated == false){
                $('#expand_'+item+' span').removeClass('arrow_down');
                $('#expand_'+item+' span').addClass('arrow_up');
                $('#'+item+' div.widget_content').removeAttr('style');
            }else{
                $('#expand_'+item+' span').removeClass('arrow_down');
                $('#expand_'+item+' span').addClass('arrow_up');
                $('#'+item+' div.widget_content').slideDown('slow');
            }

            this.collapsed[item] = false;
            if(save){
                this.collapsedStatic[item] = false;
                this.setToggle(false,item);
            }
        }else{
            $('#expand_'+item+' span').removeClass('arrow_up');
            $('#expand_'+item+' span').addClass('arrow_down');
            $('#'+item+' div.widget_content').slideUp('slow');

            this.collapsed[item] = true;
            if(save){
                this.collapsedStatic[item] = true;
                this.setToggle(true,item);
            }
        }
    },
    toggleSideBar: function(save, animated){
        var item = 'SideBar';
        if(this.collapsedStatic[item] || !save){
            if(animated == false){
                $('#leftBar').css('left','0px');
                $('#SideBarExpander_arrow').removeClass('arrow_right');
                $('#SideBarExpander_arrow').addClass('arrow_left');
                $('div#content').css('margin-left','175px');
            }else{
                $('#leftBar').animate({
                    left: "0px"
                },1000);
                $('div#content').animate({
                    marginLeft: "175px"
                },900);
                setTimeout(function(){
                    $('#SideBarExpander_arrow').removeClass('arrow_right');
                    $('#SideBarExpander_arrow').addClass('arrow_left');
                },600);
            }

            this.collapsed[item] = false;
            if(save){
                this.collapsedStatic[item] = false;
                this.setToggle(false,item);
            }
        }else{
            $('#SideBarExpander_arrow').removeClass('arrow_left');
            $('#SideBarExpander_arrow').addClass('arrow_right');
            $('#leftBar').animate({
                left: "-160px"
            },1000);
            $('div#content').animate({
                marginLeft: "20px"
            },900);

            this.collapsed[item] = true;
            if(save){
                this.collapsedStatic[item] = true;
                this.setToggle(true,item);
            }
        }
    },
    toggleSideBar_mouseover: function(event){
        var item = 'SideBar';
        if(this.collapsedStatic[item]){
            if(event == 'mousein' && this.collapsed[item]){
                $('#leftBar').animate({
                    left: "0px"
                },500, function(){
                    $('.leftbar').css('border-right-width','1px');
                });
                this.collapsed[item] = false;
                this.timedFunction = null;
            }else{
                $('#leftBar').animate({
                    left: "-160px"
                },500, function() {
                    $('.leftbar').css('border-right-width','15px');
                });
                this.collapsed[item] = true;
            }
        }
    },

    triggerSideBar: function(event){
        this.timedFunction = window.setTimeout("twentyreasonstheme.toggleSideBar_mouseover('" + event + "')", 400);
    },
    cancelSideBar: function(event){
        if(this.timedFunction)
        {
            window.clearTimeout(this.timedFunction);
            this.timedFunction = null;
        }else{
            twentyreasonstheme.toggleSideBar_mouseover(event);
        };
    },

    /*
     * Function to get the status (opened/closed) of an element from the Sidebar
     */
    getToggle: function(item){
        if (toggled[item] !== true){
            if(item == "SideBar"){
                twentyreasonstheme.toggleSideBar(false,false);
            }else{
                twentyreasonstheme.toggle(item,false,false);
            }
            twentyreasonstheme.collapsedStatic[item] = false;
        }else{
            twentyreasonstheme.collapsedStatic[item] = true;
        }
    },
    /*
     * Function to set/save the status (opened/closed) of an element from the Sidebar
     */
    setToggle: function(collapsed,item){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setToggle&menu="+item+"&to_pdf=true&collapsed="+collapsed,
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}
            }
        });
    },
    /*
     * Function to save the order of the elements from the Sidebar
     */
    sortSave: function(){
        var sort_order = '';
        $('#leftBar div.shortcuts:not(#actionmenu)').each(function(){
            sort_order += this.id + ",";
        });
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=saveSort&order="+sort_order+"&to_pdf=true",
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}
            }
        });
    },
    showConfigSideBar: function(){
        $.ajax({
            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=showConfigSideBar&to_pdf=true",
            success:function(result){
            	if(result.search('value="Login"') > -1){
            		////alert('You have been logged out !'+new Error().lineNumber);
            		twentyreasonstheme.displayLogin(result);
            	}else{
	                $('body').append('<div id="config_sidebar_dialog">'+result+'</div>');
	                $('#config_sidebar_dialog').dialog({
	                    modal: true,
	                    buttons: {
	                        "Save": function() {
	                            var config_string ="";
	                            $('#config_sidebar_dialog input:checked').each(function(){
	                                config_string += $(this).attr('name')+',';
	                            });
	                            $.ajax({
	                                url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=setWidgetUserConfig&param=TRThemeSideBarConfig&value="+config_string+"&to_pdf=true",
	                                success:function(result){
	                                    location.reload();
	                                }
	                            });
	                        },
	                        Cancel: function() {
	                            $( this ).dialog( "close" );
	                        }
	                    }
	                });
            	}
            }
        });
    },
    subpanelsTabbed: function(){
        var i = 1;
        $('#subpanel_list li').hide();

        // append container for our subpanel-tabs
        $('#subpanel_list').before('<ul id="subpanels_tabbed_list" class="subpanelTablist" />');

        //loop thru all subpanels and generate tabs in our subpanel-tab-container
        $('#subpanel_list li[id^="whole_subpanel_"]').each(function(){
            $this = $(this);
            //get the label from the original Subpanel
            var title = $('#subpanel_list li#'+this.id+' div[id^="subpanel_title_"] h3 > span').text().trim();

            //get the subpanel name
            var subpanel = this.id.split("whole_subpanel_")[1];

            //create our subpanel tab
            var newLi = document.createElement('li');
            newLi.id = "subpanelTabbed_" + subpanel;
            newLi.title = subpanel;
            newLi.style.cursor = "pointer";
            $(newLi).append('<a href="#">'+title+'</a>');

            //create the hover functionality for our subpanel tab
            $(newLi).hover(function(){
                $('#whole_subpanel_'+this.title).show();
                $('#subpanel_list li[id!="whole_subpanel_'+this.title+'"]').hide();
                $('#subpanels_tabbed_list li a.current').removeClass('current');
                $(this).children('a').addClass('current');
            },
            function(){
                //empty function for mouseOut-Event
                });

            if(i == 1){
                //first subpanel should be displayed by default
                $('#whole_subpanel_'+newLi.title).show();
                $(newLi).children('a').addClass('current');
            }

            $('#subpanels_tabbed_list').append(newLi);
            i++;
        });

        /*
    	 * tab for displaying all Subpanels
    	 */
        var newLi = document.createElement('li');
        newLi.id = "subpanelTabbed_all";
        newLi.title = "all";
        newLi.style.cursor = "pointer";
        $(newLi).append('<a href="#">All</a>');

        $(newLi).hover(function(){
            $('#subpanel_list li').show();
            $('#subpanels_tabbed_list li a.current').removeClass('current');
            $(this).children('a').addClass('current');
        },
        function(){
            });
        $('#subpanels_tabbed_list').append(newLi);

    },
    initialize: function(){
        this.getErrorCount();
        this.hijackModuleTitle();
        this.registerEvents();
        this.setDatepicker();
    },
    displayLogin : function(result){
    	$('body').html(result);
    	$('#form input[name="login_module"]').val(currentModule);
    	$('#form input[name="login_record"]').val(currentRecord);
    	$('#form input[name="login_action"]').val(currentAction);
    },
    displayGlobalLinksSubMenu : function(menu_item){
    	$('#'+menu_item+'_submenu').show();
    	$('#'+menu_item+'_submenu').offset({
    	    left : $('#'+menu_item+'_link').offset().left - 5,
    	    top : ($('#'+menu_item+'_link').offset().top - $('#'+menu_item+'_submenu').height() - 18)
    	});
    },
    /**
     * Object for the TRTheme QuickNotes
     */
    quickNotes : {
    		quickNotesCount : 0, // var for storing actual Count of Quicknotes
    		quickNotesLoaded : false, // will be set if we load the notes via AJAX . for load the content only once
    		filtered : false, // indicator if the Notes are filtered / only own,non global notes will be shown
    		open : false, // indicator if the notes-container is opened or closed. for click on the notes icon
    		/**
    		 * function that fires if the Icon (#ianotes) is clicked
    		 */
    		displayQuickNotes : function(){
    			if(twentyreasonstheme.quickNotes.open){ //check if the panel is already opened
    				$('#ianotes_container').fadeOut(); //if opened then close it
    				twentyreasonstheme.quickNotes.open = false; // and set the open indicator to false/closed
    			}else{ // if the panel isn't opened yet
    				if(twentyreasonstheme.quickNotes.quickNotesCount < 1){ //if there are no notes
    					$('#ianotes_new_container').slideDown(); // open the new note form
    				}
    				if(twentyreasonstheme.quickNotes.quickNotesLoaded){ //if the notes are already loaded from remote
    					$('#ianotes_container').fadeIn(); // just open the panel
    				}else{ // if the notes are not loaded
    					$.ajax({ // get it from the server
    			            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=getQuickNotes&to_pdf=true&currentModule=" + currentModule + "&record=" + document.forms['DetailView'].record.value,
    			            success:function(result){
    			            	if(result.search('value="Login"') > -1){
    			            		////alert('You have been logged out !'+new Error().lineNumber);
    			            		twentyreasonstheme.displayLogin(result);
    			            	}else{
	    			                var quickNotes = jQuery.parseJSON(result);
	    			                if(quickNotes.length > 0){ // if there are notes
	    				                for(var i=0;i<quickNotes.length;i++){ // loop thru the notes
	    				                	var newLi = document.createElement('li'); //new list element for the new note
	    				                	newLi.id = quickNotes[i].id; // set the id of the list-element to the note-id so we know which note id it is later on delete or edit
	    				                	if(quickNotes[i].global == '1'){ // if it is a global note
	    				                		newLi.className = "ianotes_global"; // add the css class for global notes
	    				                	}
	    				                	var newSpan = document.createElement('span'); // create new span element for the title of the note (username and date)
	    				                	newSpan.className = "ianotes_title"; // add css class for title
	    				                	newSpan.innerHTML = quickNotes[i].user_name+", "+quickNotes[i].date; //fill the content of title-span
                                        if(quickNotes[i].own == '1'){
                                            var deleteImg = document.createElement('img'); //create new img element for the delete icon
                                            deleteImg.src = "themes/20reasons/images/Trash.png";
                                            deleteImg.className = "ianotes_delete";
                                            deleteImg.title = "delete";
                                            deleteImg.onclick = function(){ // onclick delete icon
	    				                		twentyreasonstheme.quickNotes.deleteQuickNote(this.parentNode.id); //fire the deleteQuickNote function and pass thru the id of the note
	    				                		$(this).parent().remove(); //remove the li of the note from the container
	    				                	};
                                        }
	    				                	var newDiv = document.createElement('div'); // create new dev element for storing the text of the note
	    				                	newDiv.id = quickNotes[i].id+'_text'; //set id so we can find it later (for example to edit it)
	    				                	newDiv.innerHTML = quickNotes[i].text; // fill the text of the note to the text-div
	    				                	if(quickNotes[i].own == '1'){ // if this note is created by current user
	    				                		newDiv.title = 'click to edit'; //title of the text div is "click to edit" so the user knows wich notes he can edit
	    				                		newDiv.onclick = function(){ // onclick action for edition the note
		    				                	twentyreasonstheme.quickNotes.editQuickNote(this.id); // fire the edit function
		    				                	};
	}
	    				                	$(newLi).append(newDiv); //fill the text-div to the li element
	    				                	$(newLi).prepend(newSpan); //fill the title span to the li element
                                        if(quickNotes[i].own == '1'){
                                            $(newLi).prepend(deleteImg); //fill the delete img element to the li
                                        }
	    				                	$('#ianotes_container ul').append(newLi); //append the li to the notes container
	    				                }
	    				                $('#ianotes_new_container').slideUp(); //hide the new note form
	    				                twentyreasonstheme.quickNotes.quickNotesLoaded = true;// save that we have loaded the notes
	    			                }else{ // if there are no notes
	    				                twentyreasonstheme.quickNotes.quickNotesLoaded = true; // save that we have loaded the notes
	    			                	$('#ianotes_new_container').slideDown(); // display new note form
	    			                }
	    			                $('#ianotes_header_title').html("QuickNotes for " + $('#leftBar div.moduleTitle h2').text().trim()); // set the title/header of the notes container
	    			                $('#ianotes_container').fadeIn(); // display the container
    			            	}
    			            }
    			        });
    				}
    				twentyreasonstheme.quickNotes.open = true; // set indicator that panel is opened
    			}
    		},
    		/**
    		 * function to filter the notes in the container
    		 * called by clicking on the filter icon (#ianotes_filter)
    		 * only own,non global notes will be shown / all notes will be shown
    		 */
    		filterQuickNotes : function(){
    			if(twentyreasonstheme.quickNotes.filtered){ // see if the notes are already filteres
    				$('#ianotes_container li.ianotes_global:not(#ianotes_new_container)').show(); //so show the hidden/filtered notes
    				twentyreasonstheme.quickNotes.filtered = false; //set the indicator thet the notes are now not filtered
    			}else{
    				$('#ianotes_container li.ianotes_global:not(#ianotes_new_container)').hide(); //filter the notes and hide the global notes
    				twentyreasonstheme.quickNotes.filtered = true;//set the indicator thet the notes are now filtered
    			}
    		},
    		/**
    		 * function to handle saving of the note
    		 * fired from clicking the save button of the new notes form
    		 */
        setQuickNoteIcon: function(){
            if(twentyreasonstheme.quickNotes.quickNotesCount == 0){
                document.getElementById('ianotesinactive').style.display = 'block';
                document.getElementById('ianotesactive').style.display = 'none';
            }
            else
            {
                document.getElementById('ianotesinactive').style.display = 'none';
                document.getElementById('ianotesactive').style.display = 'block';    
            }
        },
    		saveQuickNote : function(){
    			$.ajax({ // send the form-data to server
    	            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=saveQuickNote&to_pdf=true&currentModule=" + currentModule + "&record=" + document.forms['DetailView'].record.value + "&global=" + $('#ianotes_new input[name="global"]:checked').length,
                data: {
                    text: document.forms['ianotes_new'].text.value
                }, // send the text as POST-Date because it could be to large for sending via GET
    	            type: 'POST',
    	            success:function(result){
    	            	if(result.search('value="Login"') > -1){
    	            		////alert('You have been logged out !'+new Error().lineNumber);
    	            		twentyreasonstheme.displayLogin(result);
    	            	}else{
	    	                var quickNotes = jQuery.parseJSON(result); // server sends the saved note back
	    	                var newLi = document.createElement('li'); //new list element for the new note
	    	            	newLi.id = quickNotes[0].id; // set the id of the list-element to the note-id so we know which note id it is later on delete or edit
	    	            	if(quickNotes[0].global == '1'){ // if it is a global note
	    	            		$('#ianotes_new_container').removeClass('ianotes_global'); // remove global class from new notes form
	    	            		newLi.className = "ianotes_global";// add the css class for global notes
	    	            	}
	    	            	var newSpan = document.createElement('span'); // create new span element for the title of the note (username and date)
	    	            	newSpan.className = "ianotes_title"; // add css class for title
	    	            	newSpan.innerHTML = quickNotes[0].user_name+", "+quickNotes[0].date; //fill the content of title-span
	    	            	var newImg = document.createElement('img');//create new img element for the delete icon
	    	            	newImg.src = "themes/20reasons/images/Trash.png";
	    	            	newImg.className = "ianotes_delete";
	    	            	newImg.title = "delete";
	    	            	newImg.onclick = function(){ // onclick delete icon
	    	            		twentyreasonstheme.quickNotes.deleteQuickNote(this.parentNode.id); //fire the deleteQuickNote function and pass thru the id of the note
	    	            		$(this).parent().remove(); //remove the li of the note from the container
	    	            	};
	    	            	var newDiv = document.createElement('div'); // create new dev element for storing the text of the note
		                	newDiv.id = quickNotes[0].id+'_text'; //set id so we can find it later (for example to edit it)
		                	newDiv.innerHTML = quickNotes[0].text; // fill the text of the note to the text-div
		                	newDiv.title = 'click to edit';//title of the text div is "click to edit" so the user knows wich notes he can edit
		                	newDiv.onclick = function(){// onclick action for edition the note
			                	if(arguments[0].originalTarget == this){// only fire if the text-div is clicked, not the delete-icon
			                		twentyreasonstheme.quickNotes.editQuickNote(this.id);// fire the edit function
			                	}
			                };
		                	$(newLi).append(newDiv); //fill the text-div to the li element
	    	            	$(newLi).prepend(newSpan); //fill the title span to the li element
	    	            	$(newLi).prepend(newImg); //fill the delete img element to the li
	    	            	$('#ianotes_new_container').hide(); //hide the new notes form
	    	            	$('#ianotes_new textarea').val(''); //clear the form
	    	            	$('#ianotes_new textarea').text(''); //clear the form
	    	            	$('#ianotes_new textarea').html(''); //clear the form
	    	            	$('#ianotes_new input[name="global"]').removeAttr('checked'); //clear the form
	    	            	$('#ianotes_new_container').after(newLi); //append the li to the notes container
	    	            	twentyreasonstheme.quickNotes.quickNotesCount++; // count the new note
                        twentyreasonstheme.quickNotes.setQuickNoteIcon()
	    	            }
    	            }
    	        });
    		},
    		/**
    		 * function to edit one note
    		 * fired if the text-div of an note (where the current user is the creator) is clicked
    		 * @param id id of the note wich should be edited
    		 */
    		editQuickNote : function(text_id){
    			$('#'+text_id).hide(); //hide the text-div of the note
    			var id = $('#'+text_id).parent().attr('id'); //get the original note id from the li-element
    			$('#'+id+' img#ianotes_delete').hide(); //hide the delete icon
    			var newForm = document.createElement('form'); //create new for element
    			newForm.className = 'action_buttons'; //set the css class of the form
    			newForm.method = 'POST'; // set method of form
    			newForm.action = '#'; //set action of form
    			newForm.id = id+'_form'; // set id of the form so the function saveEditQuickNote can find it
    			var textarea = document.createElement('textarea'); // create new textarea for storing the text to edit
    			textarea.rows = '4'; // set rowcount of the textarea
    			textarea.id = id+'_edittext'; //set id of the textarea so the function saveEditQuickNote can find it
    			textarea.innerHTML = $('#'+id+'_text').text(); //fill the original text to the textarea
    			var label = document.createElement('label'); // create the labla element for the global checkbox
    			label.style.verticalAlign = 'bottom'; //set the vertical align to bottom so the lable is biside the checkbox
    			label.innerHTML = 'global Note:'; // text of the label
    			var global = document.createElement('input'); // create new input checkbox for global
    			global.id = id+'_global'; //set id of the checkbox so the function saveEditQuickNote can find it
    			global.type = 'checkbox'; //type of the input is checkbox
    			global.value = '1'; // value if checked
    			if($('#'+id).hasClass('ianotes_global')){ // if the note we like to edit is already global
    				$(global).attr('checked' , 'checked'); //set the checkbox as checked
    			}
    			global.onclick = function(){ // onclick the global checkbox
    				$('#'+id).toggleClass('ianotes_global'); //toggle the class that marks a note as global
    			};
    			var cancel = document.createElement('input'); // create new intut for the cancel button of the form
    			cancel.className = 'button'; // set the css class so the button is styled like the Buttons of default sugar form
    			cancel.type = 'reset'; // type of the button is reset so the form is automatic cleared
    			cancel.value = 'cancel'; //value/label of the button
    			cancel.onclick = function(){ //if cancel is clicked
    				twentyreasonstheme.quickNotes.abortEditQuickNote($(this).parent().parent().attr('id')); //we fire the abortEditQuickNote function and pass the id of the note to it
    			};
    			var submit = document.createElement('input'); //create new input for the submit button of the form
    			submit.className = 'button'; // set the css class so the button is styled like the Buttons of default sugar form
    			submit.type = 'button'; //type is button instead of submit because we don't want to submit the form (we do it via ajax)
    			submit.value = 'save'; //value/label of the button
    			submit.onclick = function(){ //if submit is clicked
    				twentyreasonstheme.quickNotes.saveEditQuickNote($(this).parent().parent().attr('id'));//we fire the saveEditQuickNote function and pass the id of the note to it
    				return false; // return false so the form won't be submited
    			};
    			$(newForm).append(textarea); // put the textarea in the form element
    			$(newForm).append('<br>');
    			$(newForm).append(label);// put the label in the form element
    			$(newForm).append('&nbsp;');
    			$(newForm).append(global);// put the global checkbox in the form element
    			$(newForm).append('&nbsp;');
    			$(newForm).append(cancel);// put the cancel button in the form element
    			$(newForm).append('&nbsp;');
    			$(newForm).append(submit);// put the submit button in the form element
    			$('#'+id).append(newForm); //put the form in the note-li
    		},
    		/**
    		 * function to save the edited note
    		 * fired by the submit button of the edit note form
    		 * @param id id of the note we should save
    		 */
    		saveEditQuickNote : function(id){
    			$('#'+id+'_form').hide(); //hide the form but don't remove it yet because we need the content now
    			$.ajax({ // send the form-data to server
    	            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=editQuickNote&to_pdf=true&id=" + id + "&global=" + $('#'+id+'_global:checked').length ,
                data: {
                    text: $('#'+id+'_edittext').val()
                }, // send the text as POST-Date because it could be to large for sending via GET
    	            type: 'POST',
    	            success:function(result){
    	            	if(result.search('value="Login"') > -1){
    	            		////alert('You have been logged out !'+new Error().lineNumber);
    	            		twentyreasonstheme.displayLogin(result);
    	            	}
    	            }
    			});
    			$('#'+id+'_text').html(twentyreasonstheme.quickNotes.nl2br($('#'+id+'_edittext').val(),false)); //fill the edited text from the form to the text-div and replace new lines with html-break elements
    			$('#'+id+'_form').remove(); //remove the form cause we don't need it
    			$('#'+id+'_text').show(); // show the text-div again
    			$('#'+id+' img#ianotes_delete').removeAttr('style'); //display the delete icon again
    		},
    		/**
    		 * function to abort editing the note
    		 * fired by the cancel/reset button of the edit note form
    		 * @param id id of the note we should cancel edit
    		 */
    		abortEditQuickNote : function(id){
    			$('#'+id+'_form').remove(); //remove the form cause we don't need it
    			$('#'+id+'_text').show(); // show the text-div again
    			$('#'+id+' img#ianotes_delete').removeAttr('style'); //display the delete icon again
    		},
    		/**
    		 * function to delete a note
    		 * fired by the delete icon of a note
    		 * @param id id of the note we should delete
    		 */
    		deleteQuickNote : function(id){
    			$.ajax({
    	            url:"index.php?module=TRThemeController&action=ajaxController&ajaxAction=deleteQuickNote&to_pdf=true&id=" + id,
    	            success:function(result){
    	            	if(result.search('value="Login"') > -1){
    	            		////alert('You have been logged out !'+new Error().lineNumber);
    	            		twentyreasonstheme.displayLogin(result);
    	            	}else{
	    	            	twentyreasonstheme.quickNotes.quickNotesCount--; //change the notes counter cause now one is deleted
                                
                        // handle the icon shift
                        twentyreasonstheme.quickNotes.setQuickNoteIcon()
	    	            	if(twentyreasonstheme.quickNotes.quickNotesCount < 1){ // if we deleted the last note
	    	    				$('#ianotes_new_container').slideDown(); //display the new note form
	    	            		$('#ianotes_container').fadeOut(); //hide the notes container
	    	        			twentyreasonstheme.quickNotes.open = false; // set indicator that panel is closed now
	    	    			}
    	            	}
    	            }
    	        });
    		},

    		/**
    		 * function to close the new note form
    		 * fired by the cancel/reset button of the new note form
    		 */
    		formClose: function(){
    			if(twentyreasonstheme.quickNotes.quickNotesCount < 1){ //if we not have notes
    				$('#ianotes_container').fadeOut(); //we can hide the notes container
    				twentyreasonstheme.quickNotes.open = false; // set indicator that panel is closed now
    			}
    			$('#ianotes_new_container').slideUp(); //hide the new notes form
    		},
    		/**
    		 * function to replace new lines by html br elements
    		 * @param str string to replace the new lines
    		 * @param is_xhtml indicator if the doument is xhtml
    		 * @returns string with new lines replaced by html br elements
    		 */
    		nl2br : function(str, is_xhtml) {
    			var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    			return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
    		}
    	}
};