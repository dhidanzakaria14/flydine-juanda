/*
   Licensed to the Apache Software Foundation (ASF) under one or more
   contributor license agreements.  See the NOTICE file distributed with
   this work for additional information regarding copyright ownership.
   The ASF licenses this file to You under the Apache License, Version 2.0
   (the "License"); you may not use this file except in compliance with
   the License.  You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/
var showControllersOnly = false;
var seriesFilter = "";
var filtersOnlySampleSeries = true;

/*
 * Add header in statistics table to group metrics by category
 * format
 *
 */
function summaryTableHeader(header) {
    var newRow = header.insertRow(-1);
    newRow.className = "tablesorter-no-sort";
    var cell = document.createElement('th');
    cell.setAttribute("data-sorter", false);
    cell.colSpan = 1;
    cell.innerHTML = "Requests";
    newRow.appendChild(cell);

    cell = document.createElement('th');
    cell.setAttribute("data-sorter", false);
    cell.colSpan = 3;
    cell.innerHTML = "Executions";
    newRow.appendChild(cell);

    cell = document.createElement('th');
    cell.setAttribute("data-sorter", false);
    cell.colSpan = 7;
    cell.innerHTML = "Response Times (ms)";
    newRow.appendChild(cell);

    cell = document.createElement('th');
    cell.setAttribute("data-sorter", false);
    cell.colSpan = 1;
    cell.innerHTML = "Throughput";
    newRow.appendChild(cell);

    cell = document.createElement('th');
    cell.setAttribute("data-sorter", false);
    cell.colSpan = 2;
    cell.innerHTML = "Network (KB/sec)";
    newRow.appendChild(cell);
}

/*
 * Populates the table identified by id parameter with the specified data and
 * format
 *
 */
function createTable(table, info, formatter, defaultSorts, seriesIndex, headerCreator) {
    var tableRef = table[0];

    // Create header and populate it with data.titles array
    var header = tableRef.createTHead();

    // Call callback is available
    if(headerCreator) {
        headerCreator(header);
    }

    var newRow = header.insertRow(-1);
    for (var index = 0; index < info.titles.length; index++) {
        var cell = document.createElement('th');
        cell.innerHTML = info.titles[index];
        newRow.appendChild(cell);
    }

    var tBody;

    // Create overall body if defined
    if(info.overall){
        tBody = document.createElement('tbody');
        tBody.className = "tablesorter-no-sort";
        tableRef.appendChild(tBody);
        var newRow = tBody.insertRow(-1);
        var data = info.overall.data;
        for(var index=0;index < data.length; index++){
            var cell = newRow.insertCell(-1);
            cell.innerHTML = formatter ? formatter(index, data[index]): data[index];
        }
    }

    // Create regular body
    tBody = document.createElement('tbody');
    tableRef.appendChild(tBody);

    var regexp;
    if(seriesFilter) {
        regexp = new RegExp(seriesFilter, 'i');
    }
    // Populate body with data.items array
    for(var index=0; index < info.items.length; index++){
        var item = info.items[index];
        if((!regexp || filtersOnlySampleSeries && !info.supportsControllersDiscrimination || regexp.test(item.data[seriesIndex]))
                &&
                (!showControllersOnly || !info.supportsControllersDiscrimination || item.isController)){
            if(item.data.length > 0) {
                var newRow = tBody.insertRow(-1);
                for(var col=0; col < item.data.length; col++){
                    var cell = newRow.insertCell(-1);
                    cell.innerHTML = formatter ? formatter(col, item.data[col]) : item.data[col];
                }
            }
        }
    }

    // Add support of columns sort
    table.tablesorter({sortList : defaultSorts});
}

$(document).ready(function() {

    // Customize table sorter default options
    $.extend( $.tablesorter.defaults, {
        theme: 'blue',
        cssInfoBlock: "tablesorter-no-sort",
        widthFixed: true,
        widgets: ['zebra']
    });

    var data = {"OkPercent": 81.44391408114558, "KoPercent": 18.556085918854414};
    var dataset = [
        {
            "label" : "FAIL",
            "data" : data.KoPercent,
            "color" : "#FF6347"
        },
        {
            "label" : "PASS",
            "data" : data.OkPercent,
            "color" : "#9ACD32"
        }];
    $.plot($("#flot-requests-summary"), dataset, {
        series : {
            pie : {
                show : true,
                radius : 1,
                label : {
                    show : true,
                    radius : 3 / 4,
                    formatter : function(label, series) {
                        return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'
                            + label
                            + '<br/>'
                            + Math.round10(series.percent, -2)
                            + '%</div>';
                    },
                    background : {
                        opacity : 0.5,
                        color : '#000'
                    }
                }
            }
        },
        legend : {
            show : true
        }
    });

    // Creates APDEX table
    createTable($("#apdexTable"), {"supportsControllersDiscrimination": true, "overall": {"data": [0.0056682577565632455, 500, 1500, "Total"], "isController": false}, "titles": ["Apdex", "T (Toleration threshold)", "F (Frustration threshold)", "Label"], "items": [{"data": [0.002793296089385475, 500, 1500, "03 - Checkout Pesanan Mandiri-0"], "isController": false}, {"data": [0.0, 500, 1500, "03 - Checkout Pesanan Mandiri"], "isController": false}, {"data": [0.016666666666666666, 500, 1500, "01 - Akses Katalog (Ambil CSRF Token)"], "isController": false}, {"data": [0.0016666666666666668, 500, 1500, "02 - Tambah Menu ke Keranjang"], "isController": false}, {"data": [0.011961722488038277, 500, 1500, "02 - Tambah Menu ke Keranjang-0"], "isController": false}, {"data": [0.004784688995215311, 500, 1500, "02 - Tambah Menu ke Keranjang-1"], "isController": false}, {"data": [0.0, 500, 1500, "03 - Checkout Pesanan Mandiri-1"], "isController": false}]}, function(index, item){
        switch(index){
            case 0:
                item = item.toFixed(3);
                break;
            case 1:
            case 2:
                item = formatDuration(item);
                break;
        }
        return item;
    }, [[0, 0]], 3);

    // Create statistics table
    createTable($("#statisticsTable"), {"supportsControllersDiscrimination": true, "overall": {"data": ["Total", 1676, 311, 18.556085918854414, 26046.39797136037, 0, 68014, 27995.5, 57325.6, 59548.5, 66064.96, 8.758498513250103, 403.174315750469, 8.460498366600124], "isController": false}, "titles": ["Label", "#Samples", "FAIL", "Error %", "Average", "Min", "Max", "Median", "90th pct", "95th pct", "99th pct", "Transactions/s", "Received", "Sent"], "items": [{"data": ["03 - Checkout Pesanan Mandiri-0", 179, 0, 0.0, 26399.821229050285, 1467, 38299, 27598.0, 30647.0, 32937.0, 37478.999999999985, 1.0226409273467896, 1.9131501928877894, 1.2492559608825562], "isController": false}, {"data": ["03 - Checkout Pesanan Mandiri", 300, 125, 41.666666666666664, 29368.199999999983, 0, 67605, 41463.5, 58109.4, 59882.85, 66455.13, 1.5795043515344884, 51.3903669320234, 2.0175134537573776], "isController": false}, {"data": ["01 - Akses Katalog (Ambil CSRF Token)", 300, 51, 17.0, 18123.72666666666, 0, 38428, 19214.5, 35439.40000000001, 36736.55, 37981.79, 3.154209292300575, 236.83512923386883, 0.5343366073587703], "isController": false}, {"data": ["02 - Tambah Menu ke Keranjang", 300, 111, 37.0, 34327.88, 0, 68014, 42432.5, 63585.700000000004, 65656.84999999999, 67438.81, 1.9740478509199062, 117.2597403839194, 2.637885700161872], "isController": false}, {"data": ["02 - Tambah Menu ke Keranjang-0", 209, 0, 0.0, 25190.148325358827, 398, 38080, 29842.0, 34525.0, 36405.5, 37678.2, 1.6856605934493132, 3.1128751779420423, 1.8354605094687346], "isController": false}, {"data": ["02 - Tambah Menu ke Keranjang-1", 209, 20, 9.569377990430622, 24082.01435406699, 0, 37844, 28668.0, 30934.0, 34629.5, 37433.200000000004, 1.3788826432322592, 113.50137795486633, 1.1434270408617686], "isController": false}, {"data": ["03 - Checkout Pesanan Mandiri-1", 179, 4, 2.2346368715083798, 22817.715083798877, 0, 37831, 23847.0, 29570.0, 30818.0, 37527.799999999996, 0.9497734339350334, 48.38654584911867, 0.8729763840029501], "isController": false}]}, function(index, item){
        switch(index){
            // Errors pct
            case 3:
                item = item.toFixed(2) + '%';
                break;
            // Mean
            case 4:
            // Mean
            case 7:
            // Median
            case 8:
            // Percentile 1
            case 9:
            // Percentile 2
            case 10:
            // Percentile 3
            case 11:
            // Throughput
            case 12:
            // Kbytes/s
            case 13:
            // Sent Kbytes/s
                item = item.toFixed(2);
                break;
        }
        return item;
    }, [[0, 0]], 0, summaryTableHeader);

    // Create error table
    createTable($("#errorsTable"), {"supportsControllersDiscrimination": false, "titles": ["Type of error", "Number of errors", "% in errors", "% in all samples"], "items": [{"data": ["Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 311, 100.0, 18.556085918854414], "isController": false}]}, function(index, item){
        switch(index){
            case 2:
            case 3:
                item = item.toFixed(2) + '%';
                break;
        }
        return item;
    }, [[1, 1]]);

        // Create top5 errors by sampler
    createTable($("#top5ErrorsBySamplerTable"), {"supportsControllersDiscrimination": false, "overall": {"data": ["Total", 1676, 311, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 311, "", "", "", "", "", "", "", ""], "isController": false}, "titles": ["Sample", "#Samples", "#Errors", "Error", "#Errors", "Error", "#Errors", "Error", "#Errors", "Error", "#Errors", "Error", "#Errors"], "items": [{"data": [], "isController": false}, {"data": ["03 - Checkout Pesanan Mandiri", 300, 125, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 125, "", "", "", "", "", "", "", ""], "isController": false}, {"data": ["01 - Akses Katalog (Ambil CSRF Token)", 300, 51, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 51, "", "", "", "", "", "", "", ""], "isController": false}, {"data": ["02 - Tambah Menu ke Keranjang", 300, 111, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 111, "", "", "", "", "", "", "", ""], "isController": false}, {"data": [], "isController": false}, {"data": ["02 - Tambah Menu ke Keranjang-1", 209, 20, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 20, "", "", "", "", "", "", "", ""], "isController": false}, {"data": ["03 - Checkout Pesanan Mandiri-1", 179, 4, "Non HTTP response code: org.apache.http.conn.HttpHostConnectException/Non HTTP response message: Connect to 127.0.0.1:8000 [/127.0.0.1] failed: Connection refused: connect", 4, "", "", "", "", "", "", "", ""], "isController": false}]}, function(index, item){
        return item;
    }, [[0, 0]], 0);

});
