var app = angular.module('myApp', []);

//onpage load function which will call http request
app.factory('myService', function($http) {
  var promise;
  var myService = {
    async: function() {
      if ( !promise ) {
        promise = $http.get('search.php').then(function (response) {
          //console.log(response);
          return response.data;
        });
      }
      // Return the promise to the controller
      return promise;
    }
  };
  return myService;
});

// //the Json datas are inserted in result
// app.controller('MainCtrl', function( myService, $scope) {
//    myService.async().then(function(d) {
//     $scope.result = d;
//     alert("dsadp");
//   });
// });

// app.controller('Hello', function Hello($scope, $http) {
  
//     $http.get('http://rest-service.guides.spring.io/greeting').
//         success(function(data) {
//             $scope.greeting = data;
//         });
// });


