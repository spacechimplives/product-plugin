<?php
/**
 * Single Product
 */
get_header(); ?>
    <script type="text/javascript">
    
    </script>

    <div class="container plans" ng-controller="StoreController as store">

 <!--  Products Container  -->
    <div class="list-group">
      <!--  Product Container  -->
      <div class="list-group-item" ng-repeat="product in store.products">
        <h3>{{product.name}} <em class="pull-right">{{product.price | currency}}</em></h3>

        <!-- Image Gallery  -->
        <div ng-controller="GalleryController as gallery"  ng-show="product.images.length">
          <div class="img-wrap">
            <img ng-src="{{product.images[gallery.current]}}" />
          </div>
          <ul class="img-thumbnails clearfix">
            <li class="small-image pull-left thumbnail" ng-repeat="image in product.images">
              <img ng-src="{{image}}" />
            </li>
          </ul>
        </div>

        <!-- Product Tabs  -->
        <section ng-controller="TabController as tab">
          <ul class="nav nav-pills">
            <li ng-class="{ active:tab.isSet(1) }">
              <a href ng-click="tab.setTab(1)">Description</a>
            </li>
            <li ng-class="{ active:tab.isSet(2) }">
              <a href ng-click="tab.setTab(2)">Specs</a>
            </li>
            <li ng-class="{ active:tab.isSet(3) }">
              <a href ng-click="tab.setTab(3)">Reviews</a>
            </li>
          </ul>

          <!--  Description Tab's Content  -->
          <div ng-show="tab.isSet(1)">
            <h4>Description</h4>
            <blockquote>{{product.description}}</blockquote>
          </div>

          <!--  Spec Tab's Content  -->
          <div ng-show="tab.isSet(2)">
            <h4>Specs</h4>
            <blockquote>Shine: {{product.shine}}</blockquote>
          </div>

          <!--  Review Tab's Content  -->
          <div ng-show="tab.isSet(3)">
            <!--  Product Reviews List -->
            <ul>
              <h4>Reviews</h4>
              <li ng-repeat="review in product.reviews">
                <blockquote>
                  <strong>{{review.stars}} Stars</strong>
                  {{review.body}}
                  <cite class="clearfix">- {{review.author}} on {{review.createdOn | date}}</cite>
                </blockquote>
              </li>
            </ul>

            <!--  Review Form -->
            <form name="reviewForm" ng-controller="ReviewController as reviewCtrl" ng-submit="reviewCtrl.addReview(product)">

              <!--  Live Preview -->
              <blockquote >
                <strong>{{reviewCtrl.review.stars}} Stars</strong>
                {{reviewCtrl.review.body}}
                <cite class="clearfix">- {{reviewCtrl.review.author}} on {{review.createdOn | date}}</cite>
              </blockquote>

              <!--  Review Form -->
              <h4>Submit a Review</h4>
              <fieldset class="form-group">
                <select ng-model="reviewCtrl.review.stars" class="form-control" ng-options="stars for stars in [5,4,3,2,1]" title="Stars">
                  <option value>Rate the Product</option>
                </select>
              </fieldset>
              <fieldset class="form-group">
                <textarea ng-model="reviewCtrl.review.body" class="form-control" placeholder="Write a short review of the product..." title="Review"></textarea>
              </fieldset>
              <fieldset class="form-group">
                <input ng-model="reviewCtrl.review.author" type="email" class="form-control" placeholder="jimmyDean@example.org" title="Email" />
              </fieldset>
              <fieldset class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit Review" />
              </fieldset>
            </form>
          </div>

        </section>
      </div>

    </div>
    

<?php get_footer(); ?>