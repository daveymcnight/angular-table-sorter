<?php
require_once('../../../header.php');
?>
<title>Patient Table</title>
<script src="../../controllers/PatientsController.js"></script>
</head>
<body ng-app="patients" ng-controller="patientsController" >
<div class="banner"><h1>Patient Search</h1></div>
<div class="searchForm">
    <form ng-submit="submit()">
        <input type="text" ng-model="patientInput" placeholder="Search table (i.e. &#34;Jane Doe&#34;)">
        <input type="submit" value="Search" >
    </form>
</div>
<div class="filterForm">
    <input ng-model="patientFilter" type="text" placeholder="Filter your search">
</div>
</div>
<div class="clear-both"></div>
<!--<p>Number of Results = <span ng-show"rows.length"></span></p>-->
<div id="tableContainer">
    <table class="content-table" data-ng-init="sample()">
        <tr>
            <th class="med-small-col" ng-click="sortBy='id'; reverse=!reverse; isChecked;">P. Account <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='name'; reverse=!reverse">Last Name <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='phone'; reverse=!reverse">First Name <i class="fa fa-sort"></i></th>
            <th class="id-col" ng-click="sortBy='phone'; reverse=!reverse">MI<i class="fa fa-sort"></i></th>
            <th class="id-col" ng-click="sortBy='phone'; reverse=!reverse">SSN<i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='id'; reverse=!reverse; isChecked;">Home Phone <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='name'; reverse=!reverse">Work Phone <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='name'; reverse=!reverse">Cell Phone <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='phone'; reverse=!reverse">Address <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='fax'; reverse=!reverse">City,ST,Zip <i class="fa fa-sort"></i></th>
        </tr>
        <tr ng-repeat="d in rows | filter:doctorFilter | orderBy:sortBy:reverse" >
            <td class="med-small-col">{{d.acctpat}}</td>
            <td class="med-small-col">{{d.lname}}</td>
            <td class="med-small-col">{{d.fname}}</td>
            <td class="id-col">{{d.mi}}</td>
            <td class="id-col">{{d.l4ssn}}</td>
            <td class="med-small-col">{{d.hphone}}</td>
            <td class="med-small-col">{{d.bphone}}</td>
            <td class="med-small-col">{{d.cphone}}</td>
            <td class="med-small-col">{{d.addr}}</td>
            <td class="med-small-col">{{d.csz}}</td>
        </tr>
    </table>
    <script>

    </script>

</body>

</html>
