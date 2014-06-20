<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Laravel and Angular</title>

		<link rel="stylesheet" href="http://bootswatch.com/yeti/bootstrap.css"> <!-- load bootstrap via cdn -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
		<style>
			body 	{ background: #f7f7f7; padding-top:30px; }
			form 	{ padding-bottom: 20px; }
			.well 	{ background: #f4f4f4; border: 1px solid #ddd; }
		</style>
	</head>
	<body class="container" ng-app="commentApp" ng-controller="mainController">
		<div class="col-md-8 col-md-offset-2">

			<div class="page-header">
				<h2>Commenting System</h2>
			</div>

			<form ng-submit="submitComment()" class="form" role="form" name="commentForm" validate> 
				<div class="form-group" ng-class="{ 'has-error' : commentForm.author.$invalid && !commentForm.author.$pristine }">
					<input type="text" class="form-control input-md" id="author" name="author" ng-model="commentData.author" placeholder="Your Name here!" required/>
					<p ng-show="commentForm.author.$invalid && !commentForm.author.$pristine" class="help-block">We need to know who are you.</p>
				</div>

				<div class="form-group" ng-class="{ 'has-error' : commentForm.comment.$invalid && !commentForm.comment.$pristine }">
					<textarea class="form-control input-md" rows="4" style="resize: none;" id="comment" name="comment" ng-model="commentData.text" placeholder="Say what you have to say" required></textarea>
					<p ng-show="commentForm.comment.$invalid && !commentForm.comment.$pristine" class="help-block">We can't read your mind. :(</p>
				</div>
				<div class="form-group" ng-class="{ 'has-error' : commentForm.indent.$invalid && !commentForm.indent.$pristine }">
					<input type="text" class="form-control input-md" name="indent" ng-model="commentData.indent" placeholder="Equal: (1x1+1/1)-1" pattern="[1]{1}" title="It isn't correct" ng-maxlength="1" required/>
					<p ng-show="commentForm.indent.$invalid && !commentForm.indent.$pristine" class-"help-block">I'm sorry is required</p>
				</div>
				<div class="form-group text-right" style="margin-bottom: 0;">	
					<button type="submit" class="btn btn-primary btn-block" ng-disabled="commentForm.$invalid">Go</button>
				</div>
			</form>

			<pre style="margin-top:10px;margin-bottom:25px;">
			{{ commentData }} 
			</pre>

			<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

			<div ng-hide="loading" ng-repeat="comment in comments">
				<div ng-if="1 == comment.indent" class="well well-small">
					<h3>Comment <small>by {{ comment.author }}</h3>
					<h4 style="padding: 10px;">{{ comment.text }}</h4>

					<p style="padding: 10px;">
						<a href="#" ng-click="deleteComment(comment.id)" class="btn btn-danger btn-xs">Delete</a>
						<a href="#" data-toggle="modal" data-target="#call_back" class="btn btn-info btn-xs">Call back</a>
					</p>
				</div>
				<div ng-if="2 == comment.indent" class="well well-small" style="margin-left: 35px;background: #eee;">
					<h3>Call back <small>by {{ comment.author }}</h3>
					<h4 style="padding: 10px;">{{ comment.text }}</h4>

					<p style="padding: 10px;">
						<a href="#" ng-click="deleteComment(comment.id)" class="btn btn-danger btn-xs">Delete</a>
					</p>
				</div>
			</div>

		</div>

		<div class="modal fade" id="call_back" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	                </div>
	                <div class="modal-body" style="margin-top: -25px;margin-bottom: -25px;background: #f4f4f4;">
	                	<h3>Callback System</h3>
	                	<form class="form" role="form" ng-submit="submitCallback()" name="callbackForm" validate>
	                		<div class="form-group" ng-class="{ 'has-error' : callbackForm.author.$invalid && !callbackForm.author.$pristine }">
	                			<input type="text" class="form-control input-md" id="author" name="author" ng-model="callbackData.author" placeholder="Your Name here!" required/>
	                			<p ng-show="callbackForm.author.$invalid && !callbackForm.author.$pristine" class="help-block">We need to know who are you.</p>
	                		</div>
	                		
	                		<div class="form-group" ng-class="{ 'has-error' : callbackForm.author.$invalid && !callbackForm.author.$pristine }">
	                			<textarea class="form-control input-md" rows="4" style="resize: none;" id="comment" name="comment" ng-model="callbackData.text" placeholder="Say what you have to say" required></textarea>
	                			<p ng-show="callbackForm.comment.$invalid && !callbackForm.comment.$pristine" class="help-block">We can't read your mind. :(</p>
	                		</div>
	                		
	                		<div class="form-group" ng-class="{ 'has-error' : callbackForm.indent.$invalid && !callbackForm.indent.$pristine}">
	                			<input type="text" class="form-control input-md" name="indent" ng-model="callbackData.indent" placeholder="Equal: (2+2*2/2)-2" pattern="[2]{1}" title="It isn't correct" ng-maxlength="1" required/>
	                			<p ng-show="callbackForm.indent.$invalid && !callback.indent.$pristine" class="help-block">I'm sorry is required</p>
	            			</div>
	  						
	  						<button type="submit" class="btn btn-primary" ng-disabled="callbackForm.$invalid">Go</button>
	  						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  					</form>
	                </div>
	                <div class="modal-footer">	                    
	                </div>
	            </div>
	        </div>
	    </div>

		<!-- js Files -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->
		<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/commentService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->
	</body>
</html>