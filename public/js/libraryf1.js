
var marker;
var infowindow = new google.maps.InfoWindow();

function loadPolygons(){
        
        var p1 = [{lat:5.938680105907951,lng:80.57648676322935},{lat:5.938676104186759,lng:80.57657393502234},{lat:5.938662765115864,lng:80.57657326447008},{lat:5.938666099883619,lng:80.57648743378161}];

        var shell1 = new google.maps.Polygon({
          paths: p1,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });

        shell1.setMap(map);

        shell1.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b>General works Books, Computer science and Information Books.</b>Sub Categories are..<ul><li>Computer science, knowledge & systems</li><li>Bibliographies</li><li>Library & information sciences</li><li>Encyclopedias & books of facts</li><li>Unassigned (formerly Biographies)</li><li>Magazines, journals & serials</li><li>Associations, organizations & museums</li><li>News media, journalism & publishing</li><li>Quotations</li><li>Manuscripts & rare books</li>");
            infowindow.open(map, marker);
        });
        
	  	var p2 = [{lat:5.938712119676508,lng:80.57648810433386},{lat:5.938695445838952,lng:80.57648676322935},{lat:5.938693444978413,lng:80.57652163194655},{lat:5.938710118816033,lng:80.5765209613943}];

        var shell2 = new google.maps.Polygon({
          paths: p2,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell2.setMap(map);


        shell2.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b>Philosophy & psychology Books.</b>Sub Categories are..<ul><li>Philosophy</li><li> Metaphysics</li><li> Epistemology</li><li>Parapsychology & occultism</li><li> Philosophical schools of thought</li><li>Psychology</li><li>  Philosophical logic</li><li> Ethics</li><li>  Ancient, medieval, & Eastern philosophy</li><li> Modern Western philosophy (19th-century, 20th-century)</li></ul>");
            infowindow.open(map, marker);
        });
        

	  	var p3 = [{lat:5.938709451862532,lng:80.5765209613943},{lat:5.938707451002045,lng:80.57656857060431},{lat:5.938747468210466,lng:80.57660679208277},{lat:5.938736796955176,lng:80.57661953257559},{lat:5.938691444117862,lng:80.57657661723135},{lat:5.938692778024888,lng:80.57652163194655}];

        var shell3 = new google.maps.Polygon({
          paths: p3,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell3.setMap(map);


        shell3.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
           infowindow.setContent("In This Book Shell Contains <b> Religion Books.</b>Sub Categories are..<ul><li> Religion</li><li> Philosophy & theory of religion</li><li>The Bible</li><li>Christianity</li><li>Christian practice & observance</li><li>Christian orders & local church</li><li> Social & ecclesiastical theology</li><li>History of Christianity</li><li>Christian denominations</li><li>Other religions</li></ul>");
           infowindow.open(map, marker);
        });
        

	  	var p4 = [{lat:5.9387488021173525,lng:80.57660746263502},{lat:5.938844843405467,lng:80.57669999884604},{lat:5.93895555764738,lng:80.57670469271181},{lat:5.93895555764738,lng:80.5767207859659},{lat:5.938850179032094,lng:80.57671676265238},{lat:5.938827502618583,lng:80.57670536326407},{lat:5.938736130001701,lng:80.57661819147108}];

        var shell4 = new google.maps.Polygon({
          paths: p4,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell4.setMap(map);


        shell4.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b> Social sciences Books.</b>Sub Categories are..<ul><li> Social sciences, sociology & anthropology</li><li> Statistics</li><li>Political science</li><li> Economics</li><li> Law</li><li> Public administration & military science</li><li>Social problems & social services</li><li>Education</li><li> Commerce, communications, & transportation</li><li> Customs, etiquette, & folklore</li></ul>");
            infowindow.open(map, marker);
        });
        

        var p5 = [{lat:5.938967562804798,lng:80.57673084424971},{lat:5.938966228898434,lng:80.57680393444537},{lat:5.93895222288138,lng:80.57680393444537},{lat:5.93895555764738,lng:80.57673151480196}];

        var shell5 = new google.maps.Polygon({
          paths: p5,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell5.setMap(map);


        shell5.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b> Social sciences Books.</b>Sub Categories are..<ul><li> Social sciences, sociology & anthropology</li><li> Statistics</li><li>Political science</li><li> Economics</li><li> Law</li><li> Public administration & military science</li><li>Social problems & social services</li><li>Education</li><li> Commerce, communications, & transportation</li><li> Customs, etiquette, & folklore</li></ul>");
            infowindow.open(map, marker);
        });
        

        var p6 = [{lat:5.9389342151446485,lng:80.57677174793719},{lat:5.938933548191427,lng:80.57678985284804},{lat:5.938906870061813,lng:80.57678851174353},{lat:5.938906870061813,lng:80.57677174793719}];

        var shell6 = new google.maps.Polygon({
          paths: p6,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell6.setMap(map);


        shell6.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b> Language Books.</b>Sub Categories are..<ul><li>  Language</li><li> Linguistics</li><li> English & Old English languages</li><li>German & related languages</li><li> French & related languages</li><li>Italian, Romanian, & related languages</li><li>Spanish, Portuguese, Galician</li><li> Latin & Italic languages</li><li> Classical & modern Greek languages</li><li> Other languages</li></ul>");
            infowindow.open(map, marker);
        });
        

        var p7 = [{lat:5.938906870061813,lng:80.57677174793719},{lat:5.938906870061813,lng:80.57678784119128},{lat:5.938870854584799,lng:80.57678717063902},{lat:5.938870854584799,lng:80.57677107738493}];

        var shell7 = new google.maps.Polygon({
          paths: p7,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell7.setMap(map);


        shell7.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
           infowindow.setContent("In This Book Shell Contains <b>  Science Books.</b>Sub Categories are..<ul><li>Science</li><li>  Mathematics</li><li>  Astronomy</li><li>Physics</li><li> Chemistry</li><li>Earth sciences & geology</li><li>Fossils & prehistoric life</li><li> Biology</li><li>Plants</li><li> Animals (Zoology)</li></ul>");
           infowindow.open(map, marker);
        });
        

        

        var p8 = [{lat:5.938868853724884,lng:80.57680527554987},{lat:5.938784817602368,lng:80.57680460499762},{lat:5.938654094719624,lng:80.57667720006941},{lat:5.938643423462525,lng:80.57668658780096},{lat:5.938779481975118,lng:80.5768193571472},{lat:5.938868186771587,lng:80.57682270990847}];

        var shell8 = new google.maps.Polygon({
          paths: p8,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell8.setMap(map);


        shell8.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
           infowindow.setContent("In This Book Shell Contains <b>  Science Books.</b>Sub Categories are..<ul><li>Science</li><li>  Mathematics</li><li>  Astronomy</li><li>Physics</li><li> Chemistry</li><li>Earth sciences & geology</li><li>Fossils & prehistoric life</li><li> Biology</li><li>Plants</li><li> Animals (Zoology)</li></ul>");
           infowindow.open(map, marker);
        });
        

      var p9 = [{lat:5.938652760812496,lng:80.57667787062167},{lat:5.938616078365253,lng:80.57664031969546},{lat:5.938532042204163,lng:80.57664099024771},{lat:5.9385327091578795,lng:80.57655247735022},{lat:5.9385213709447,lng:80.57654644237994},{lat:5.93851736922235,lng:80.57665238963602},{lat:5.938610742736359,lng:80.57665507184504},{lat:5.9386427565089495,lng:80.57668591724871}];

        var shell9 = new google.maps.Polygon({
          paths: p9,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell9.setMap(map);


        shell9.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
           infowindow.setContent("In This Book Shell Contains <b> Technology Books.</b>Sub Categories are..<ul><li>Technology</li><li> Medicine & health</li><li> Engineering</li><li>Agriculture</li><li> Home & family management</li><li>Management & public relations</li><li>Chemical engineering</li><li>Manufacturing</li><li>Manufacture for specific uses</li><li>Construction of buildings</li></ul>");
           infowindow.open(map, marker);
        });
        


      var p10 = [{lat:5.938533376111596,lng:80.57655180679797},{lat:5.938554051676172,lng:80.57653169023035},{lat:5.938544714324522,lng:80.57652297305106},{lat:5.9385213709447,lng:80.57654577182768}];

        var shell10 = new google.maps.Polygon({
          paths: p10,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell10.setMap(map);


        shell10.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b>  Arts & recreation Books.</b>Sub Categories are..<ul><li>Arts</li><li> Area planning & landscape architecture</li><li> Architecture</li><li>Sculpture, ceramics, & metalwork</li><li>  Graphic arts & decorative arts</li><li> Painting</li><li>Printmaking & prints</li><li>Photography, computer art, film, video</li><li>Music</li><li>Sports, games & entertainment</li></ul>");
            infowindow.open(map, marker);
        });
        

      var p11 = [{lat:5.938553384722493,lng:80.57653169023035},{lat:5.938594068895737,lng:80.57649548040865},{lat:5.938628750483677,lng:80.5764961509609},{lat:5.938630084390856,lng:80.57648408102034},{lat:5.938587399359336,lng:80.57648206936358},{lat:5.938544047370818,lng:80.57652364360331}];

        var shell11 = new google.maps.Polygon({
          paths: p11,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell11.setMap(map);


        shell11.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b> Literature Books.</b>Sub Categories are..<ul><li> Literature, rhetoric & criticism</li><li> American literature in English</li><li> English & Old English literatures</li><li>S German & related literatures</li><li>French & related literatures</li><li> Italian, Romanian, & related literatures</li><li>Spanish, Portuguese, Galician literatures</li><li> Latin & Italic literatures</li><li> Classical & modern Greek literatures</li><li>Other literatures</li></ul>");
            infowindow.open(map, marker);
        });
        

       
      
      var p12 =  [{lat:5.938631418298022,lng:80.57648408102034},{lat:5.938666766837171,lng:80.57648542212485},{lat:5.938664765976505,lng:80.57651894973753},{lat:5.938615411411624,lng:80.57651894973753},{lat:5.938615411411624,lng:80.5765310196781},{lat:5.93860207233928,lng:80.57653236078261},{lat:5.938603406246535,lng:80.57650687979697},{lat:5.938652760812496,lng:80.57650755034922},{lat:5.938652093858945,lng:80.5764961509609},{lat:5.938630084390856,lng:80.57649548040865}];

        var shell12 = new google.maps.Polygon({
          paths: p12,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell12.setMap(map);


        shell12.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b>History & geography Books.</b>Sub Categories are..<ul><li>History</li><li> Geography & travel</li><li>Biography & genealogy</li><li> History of ancient world (to ca. 499)</li><li> History of Europe</li><li>  History of Asia</li><li> History of Africa</li><li>History of North America</li><li> History of South America</li><li>History of other areas</li></ul>");
            infowindow.open(map, marker);
        });

        var p13 =  [{lat:5.938572646300506,lng:80.57654544711113},{lat:5.938573313254159,lng:80.57653807103634},{lat:5.93864067556974,lng:80.57653941214085},{lat:5.938640008616164,lng:80.57660914957523},{lat:5.938565976763851,lng:80.57660914957523},{lat:5.938565976763851,lng:80.57653874158859},{lat:5.938573313254159,lng:80.57653807103634},{lat:5.938572646300506,lng:80.57654544711113},{lat:5.938632672126734,lng:80.57654745876789},{lat:5.938632005173144,lng:80.57660177350044},{lat:5.938573313254159,lng:80.57660043239594},{lat:5.938573980207825,lng:80.57654611766338},{lat:5.938572646300506,lng:80.57654544711113}];

        var shell13 = new google.maps.Polygon({
          paths: p13,
          strokeColor: '#212121',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#212121',
          fillOpacity: 0.35
        });
        shell13.setMap(map);


        shell13.addListener('click', function (event) {
        if (marker && marker.setPosition) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({position: event.latLng,map:map});
        }
            infowindow.setContent("In This Book Shell Contains <b>Catalogues</b>");
            infowindow.open(map, marker);
        });
        

}