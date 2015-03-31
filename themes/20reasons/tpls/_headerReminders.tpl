<span class="shortcutstitle">Reminders</span>
<ul>
    {foreach from=$favoriteRecords item=favitem name=favRecord}
        <li id='reminder{$favitem.bean_id}'>
            <div class='favitemDetails'>
                <img src="themes/20reasons/images/close_inline.gif" style="float:right" onclick="twentyreasonstheme.removeReminderById('{$favitem.bean_id}');"></img>&nbsp;
                <span style="float:left">{$favitem.reminder_date}</span><span style="float:right">{$favitem.icon}</span>
            </div>
            <div>
                <a title="{$favitem.summary}"
                   href="{sugar_link module=$favitem.bean action='DetailView' record=$favitem.bean_id link_only=1}">
                    <span>{$favitem.summary}</span>
                </a>
                <div class="changeIcon"><a title="{$favitem.summary}"
                                           href="{sugar_link module=$favitem.bean action='EditView' record=$favitem.bean_id link_only=1}">
                        <img src="themes/20reasons/images/dashlet-header-edit.gif"></a></div>
            </div>
        </li>
    {/foreach}
</ul>