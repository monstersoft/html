<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="recursos/bootstrap/css/bootstrap.min.css">
    <style>
        #tableContainer {
  width: 300px;
  overflow: auto;
  /*overflow-y: scroll;*/
}
.td-fixed {
  position: fixed;
  left: 0px;
  width: 30px;
  z-index: 1;
  height: 25px;
}
.white-background {
  background-color: white;
}
.gray-background {
  background-color: gray;
}
.td-fixed-margin {
  margin-left: 31px;
}
.td-fixed-padding {
  padding-left: 31px;
}
.all-table {
  width: 1000px;
  margin-top: 0;
  table-layout: fixed;
  border-spacing: 0;
}
td {
  border-right: solid 1px #cccccc;
  border-bottom: solid 1px #cccccc;
  height: 25px;
  padding: 0;
  overflow: hidden;
  -ms-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}
.td-editable-position {
  left: 148px;
  position: relative;
}
    </style>
</head>
<body>
<div id="tableContainer">
  <table class="all-table">
    <colgroup>
      <col style="width:54px;" />
      <col style="width:180px;" />
      <col style="width:180px;" />
      <col style="width:180px;" />
      <col style="width:30px;" />
    </colgroup>
    <thead>
      <tr>
        <td class="td-fixed gray-background">a</td>
        <td class="td-fixed td-fixed-margin gray-background">a</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed gray-background">a</td>
        <td class="td-fixed td-fixed-margin gray-background">a</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
        <td class="gray-background">aaaaaaaaaaaa</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      
            <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
      <tr>
        <td class="td-fixed white-background">a</td>
        <td class="td-fixed td-fixed-margin white-background">a</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
        <td>aaaaaaaaaaaa</td>
      </tr>
    </tbody>
  </table>
</div>
    <script src="recursos/jquery/jquery.min.js"></script>
    <script src="recursos/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>