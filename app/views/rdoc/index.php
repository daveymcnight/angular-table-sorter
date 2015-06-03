<?php
require_once('../../../header.php');
?>
<title>Rdoc Table</title>
<script src="../../controllers/ReferredDoctorsController.js"></script>
</head>
<body ng-app="rdoc" ng-controller="rdocController" >
<div class="banner"><h1>Referring Doctors (RDOC)</h1></div>
<div class="searchForm">
    <form ng-submit="submit()">
        <input type="text" ng-model="rdocInput" placeholder="Search table (i.e. &#34;Jane Doe&#34;)">
        <input type="submit" value="Search" >
    </form>
</div>
<div class="filterForm">
    <input ng-model="doctorFilter" type="text" placeholder="Filter your search">
</div>
<div class="requestsContainer">
   <a target="_blank" href="http://myjervey.com/it-all/250-rdoc-request">Add</a>
    <a target="_blank" href="http://myjervey.com/it-all/266-rdoc-change-request">Change</a>
</div>
<div class="clear-both"></div>
<div id="tableContainer">
    <table class="content-table" data-ng-init="sample()">
        <tr>
            <th class="id-col" ng-click="sortBy='id'; reverse=!reverse; isChecked;">Rdoc <i class="fa fa-sort"></i></th>
            <th class="med-large-col" ng-click="sortBy='name'; reverse=!reverse">Name <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='phone'; reverse=!reverse">Phone <i class="fa fa-sort"></i></th>
            <th class="med-small-col" ng-click="sortBy='fax'; reverse=!reverse">Fax <i class="fa fa-sort"></i></th>
            <th class="large-col" ng-click="sortBy='practice'; reverse=!reverse">Practice <i class="fa fa-sort"></i></th>
            <th class="med-col" ng-click="sortBy='address'; reverse=!reverse">Address <i class="fa fa-sort"></i></th>
        </tr>
        <tr ng-repeat="d in rows | filter:doctorFilter | orderBy:sortBy:reverse" >
            <td class="id-col">{{d.id}}</td>
            <td class="med-large-col">{{d.name}}</td>
            <td class="med-small-col">{{d.phone}}</td>
            <td class="med-small-col">{{d.fax}}</td>
            <td class="large-col">{{d.practice}}</td>
            <td class="med-col">{{d.address}}</td>
        </tr>
    </table>
    <script>

    </script>

</body>

</html>

