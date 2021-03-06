(function() {
  var app = angular.module('productStore', []);

  app.controller('StoreController', function() {
    this.products = data;
  });

  app.controller("TabController", function() {
    this.tab = 1;

    this.isSet = function(checkTab) {
      return this.tab === checkTab;
    };

    this.setTab = function(setTab) {
      this.tab = setTab;
    };
  });

  app.controller('GalleryController', function(){
    this.current = 0;

    this.setCurrent = function(imageNumber){
      this.current = imageNumber || 0;
    };
  });

  app.controller("ReviewController", function(){

    this.review = {};

    this.addReview = function(product){
      product.reviews.push({ createdOn: Date.now() });
      product.reviews.push(this.review);
      this.review = {};
    };
  });
  
  app.controller('ContentCtrl', ['$scope', '$http', function ($scope, $http) {
    $http.get('products-json.php')
    .success(function(data) {
        $scope.products = data;
    })}]);
})();