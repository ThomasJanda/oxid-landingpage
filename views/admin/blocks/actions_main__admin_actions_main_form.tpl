[{$smarty.block.parent}]
[{if $edit->oxactions__oxid->value!="" && ($edit->oxactions__oxtype->value == 0 || $edit->oxactions__oxtype->value == 1)}]
            </tbody>
        </table>
    </td>
    <td class="edittext" valign="top" style="width:65%;padding-right: 20px;">
        <table cellspacing="5" cellpadding="0" border="0" style="position:absolute; ">
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <a href="[{$oViewConf->getBaseDir()}]index.php?cl=rs_landingpage&actionlist=[{$edit->oxactions__oxid->value}]" target="_blank">
                            Landingpage: index.php?cl=rs_landingpage&actionlist=[{$edit->oxactions__oxid->value}]
                        </a>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>[{ $editor }]</td>
                </tr>
                </tbody>
        </table>
    </td>
    </tr>
    <tr>
    <td class="edittext" valign="top" style="padding-right: 20px;">
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
[{/if}]