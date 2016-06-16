@extends('layouts.default')


@section('header')
<meta http-equiv="refresh" content="460; URL={{URL::to('/')}}">
@stop

@section('content')
	<div class="row">
		<div class="social-slider">
			<div>
				<h1>eBash Social</h1>
				<h2>To get on screen tag:</h2>
				<div class="row">
					<div class="large-3 columns"><img src="images/twitter-icon.png"></div>
					<div class="large-9 columns sstext">#ebash</div>
				</div>
				<div class="row">
					<div class="large-3 columns"><img src="images/insta-icon.png"></div>
					<div class="large-9 columns sstext">#ebash</div>
				</div>
			</div>
			

			@for ($i = 0; $i < count($tweets); $i++)
				<div class="row">
					<div class="row user-info">
						<div class="large-3 columns">
							<a href="http://twitter.com/{{$tweets[$i]->user_screen_name}}"><img class="twit-profile-image" src="{{$tweets[$i]->profile_image_url}}" /></a>
						</div>
						<div class="large-5 columns screen-name">
							<a href="http://twitter.com/{{$tweets[$i]->user_screen_name}}">{{'@'.$tweets[$i]->user_screen_name}}</a>
						</div>
						<div class="large-4 columns end date">
							{{date('M j', $tweets[$i]->tweet_created_at)}}
						</div>
					</div>
					@if (isset($tweets[$i]->media_url))
						<div class="row split-view">
							<div class="large-5 columns">
								<img class="slick-slider" src="{{$tweets[$i]->media_url}}" />
							</div>
							<div class="large-7 columns">
								<p class="split-view">
									{{$tweets[$i]->getWebEncodedTweetText('tweet_text')}}
								</p>
							</div>
						</div>
					@else
						<div class="row">
							<div class="large-12 columns">
								<p>
									{{$tweets[$i]->getWebEncodedTweetText('tweet_text')}}
								</p>
							</div>
						</div>
					@endif
				</div>
			@endfor
			

			@for ($i = 0; $i < count($igposts); $i++)
				<div class="row">
					<div class="row user-info">
						<div class="large-3 columns">
							<a href="http://instagram.com/{{$igposts[$i]->username}}"><img class="ig-profile-image" src="{{$igposts[$i]->profile_picture}}" /></a>
						</div>
						<div class="large-5 columns screen-name">
							<a href="http://instagram.com/{{$igposts[$i]->username}}">{{'@'.$igposts[$i]->username}}</a>
						</div>
						<div class="large-4 columns end date">
							{{date('M j', $igposts[$i]->post_created_at)}}
						</div>
					</div>
					<div class="row split-view">
						<div class="large-5 columns">
							@if($igposts[$i]->media_type === 'video')
							<video width="500" height="500" controls>
							  <source src="{{$igposts[$i]->media_video_url}}" type="video/mp4">
							Your browser does not support the video tag.
							</video>
							@else
							<img class="slick-slider"src="{{$igposts[$i]->media_image_url}}" />
							@endif
						</div>
						<div class="large-7 columns">
						<p>{{$igposts[$i]->getWebEncodedCaptionText('caption_text')}}</p>
						</div>
					</div>
				</div>
			@endfor
		</div>
	</div>
@stop