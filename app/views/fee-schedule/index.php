<?php
require_once('../../header.php');
?>
<title>Fee Schedules</title>
</head>
<body ng-app="feeSchedule" ng-controller="feeScheduleController">
<div class="banner"><h1>Fee Schedules</h1></div>
<div class="searchForm">
    <form ng-submit="submit()">
        <input type="text" ng-model="feeScheduleInput" placeholder="Search table (i.e. &#34;MCAID&#34;)">
        <input type="submit" value="Search" >
    </form>
</div>
<div class="searchForm" data-ng-init="companySelectBox()">
    <form ng-submit="advancedSearch()" style="text-align: center">
        <select ng-model="insurancecomp">
            <option value="ANY" selected="selected">ANY</option>
            <option ng-repeat="x in companies" value="{{x.insurancecomp}}">{{x.insurancecomp}}</option>
        </select>
        <input type="checkbox" ng-model="feeScheduleTop50"  ng-true-value="1" ng-false-value="0"> Top 50
        <input type="checkbox" ng-model="feeScheduleExam" ng-true-value="1" ng-false-value="0"> Exam
        <input type="submit"></form>
    </form>
</div>


<div class="filterForm">
    <input ng-model="jerveyFilter" type="text" placeholder="Filter your search">
</div>
<div class="clear-both"></div>
<div id="tableContainer">
    <table class="content-table" data-ng-init="sample()">
        <tr>
            <th class="id-col" ng-click="sortBy='tcode'; reverse=!reverse; ">Tcode <i class="fa fa-sort"></i></th>
            <th class="med-large-col" ng-click="sortBy='insurancecomp'; reverse=!reverse">Insurance Comp. <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='bdate'; reverse=!reverse">Beg. Date <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='edate'; reverse=!reverse">End Date <i class="fa fa-sort"></i></th>
            <th class="large-col" ng-click="sortBy='description'; reverse=!reverse">Description <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='chargeamount'; reverse=!reverse">Charge Amount <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='allowedamount'; reverse=!reverse">Allowed Amount <i class="fa fa-sort"></i></th>
        </tr>
        <tr ng-repeat="x in rows | filter:jerveyFilter | orderBy:sortBy:reverse" >
            <td class="id-col">{{x.tcode}}</td>
            <td class="med-large-col">{{x.insurancecomp}}</td>
            <td class="med-small-col">{{x.bdate}}</td>
            <td class="med-small-col">{{x.edate}}</td>
            <td class="large-col">{{x.description}}</td>
            <td class="med-small-col">{{x.chargeamount}}</td>
            <td class="med-small-col">{{x.allowamount}}</td>
        </tr>
    </table>
    <script>

    </script>

</body>

</html>

