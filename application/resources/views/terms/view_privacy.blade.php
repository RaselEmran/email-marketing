<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('partials.htmlheader')

<body class="skin-{!! configValue('sidebar_theme') ? configValue('sidebar_theme'):'red-light'!!} sidebar-mini">
<div class="wrapper">

    @include('partials.mainheader')
    <div class="content-wrapper">
        <section class="content" style="padding-top: 50px;padding-left: 20px">

            <?php
            if (!empty($termsCondition)) {
                echo $termsCondition;
            } elseif (!empty($privacy)) {
                echo $privacy;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>