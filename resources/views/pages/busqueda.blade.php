@extends('master')

@section('title', 'Clientes')

@section('content')
<!-- Content -->
<div class="container-fluid">
  <div class="col-xs-12 col-sm-3 col-md-3">
    <div class="panel panel-webkentron">
		  <div class="panel-heading">Categorías</div>
		  <ul class="list-group">
		    <a href="#"><li class="list-group-item lipanel">Categoría 1</li></a>
		    <a href="#"><li class="list-group-item lipanel">Categoría 2</li></a>
		    <a href="#"><li class="list-group-item lipanel">Categoría 3</li></a>
        <a href="#"><li class="list-group-item lipanel">Categoría 4</li></a>
        <a href="#"><li class="list-group-item lipanel">Categoría 5</li></a>
        <a href="#"><li class="list-group-item lipanel">Categoría 6</li></a>
		</div>
  </div>
	<div class="col-xs-12 col-sm-9 col-md-9">
    <!-- Search Engine -->
    <div id="imaginary_container"> 
      <div class="input-group stylish-input-group">
        <input type="text" class="form-control"  placeholder="Search" >
          <span class="input-group-addon">
            <button type="submit"><span class="glyphicon glyphicon-search"></span></button> 
          </span>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9">
      <div id=firstt>
        <h4>Results</h4>
        <span class="style-font"><strong>Login error #x0454545</strong></span>
        <span>
          - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.
          <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-new-window"></span> View Details</button>
        </span>
        <!-- View Details Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Element Details</h4>
              </div>
              <div class="modal-body">
                <!-- View Details Modal Body -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Element Title</h3>
                      <div class="col-md-4">
                        <img src="#" alt="Preview">
                      </div>
                      <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.</p>
                      </div>
                    </div>
                    <section class="col-md-8">
                      <video width="800" height="400">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
                      </video>
                              </section>
                    <section class="col-md-8">
                      <button type="button" class="btn btn-primary btn-lg raised">Download Video</button>
                      <button type="button" class="btn btn-primary btn-lg outline">Download Files</button>
                    </section>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="stylesm col-xs-12 col-sm-9 col-md-9">
      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-comment"></span> Add a Comment
      </button>
      <!-- Rating Stars -->
      <div class="lead stylesm">
        <div id="stars" class="starrr stylesm"></div>
          <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)
          </span>
      </div>
      <!-- Modal for Comments -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Comments Section</h4>
            </div>
            <div class="modal-body">
              <!-- Modal Comments -->
              <div class="detailBox">
                <div class="titleBox">
                  <label>Comment Box</label>
                </div>
                <div class="commentBox">
                  <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="actionBox">
                  <ul class="commentList">
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/50/50"/>
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/45/45"/>
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                    <li>
                      <div class="commenterImage">
                        <img src="http://placekitten.com/40/40" />
                      </div>
                      <div class="commentText">
                        <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
                      </div>
                    </li>
                  </ul>
                  <form class="form-inline" role="form">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Your comments" />
                    </div>
                    <div class="form-group">
                      <button class="btn btn-default">Add</button>
                    </div>
                    <div class="lead stylesm">
                      <div id="stars" class="starrr stylesm"></div>
                        <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)</span>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Modal Comments -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <hr> <!-- Division between results -->
 		</div>
    <!-- Search Engine Results -->
    <div class="col-xs-12 col-sm-9 col-md-9">
      <div id=firstt>
        <h4>Results</h4>
        <span class="style-font"><strong>Login error #x0454545</strong></span>
        <span>
          - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.
          <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-new-window"></span> View Details </button>
        </span>
        <!-- View Details Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Element Details</h4>
              </div>
              <div class="modal-body">
                <!-- View Details Modal Body -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Element Title</h3>
                      <div class="col-md-4">
                        <img src="#" alt="Preview">
                      </div>
                      <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.</p>
                      </div>
                    </div>
                    <section class="col-md-8">
                      <video width="800" height="400">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
                      </video>
                    </section>
                    <section class="col-md-8">
                      <button type="button" class="btn btn-primary btn-lg raised">Download Video</button>
                      <button type="button" class="btn btn-primary btn-lg outline">Download Files</button>
                    </section>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="stylesm col-xs-12 col-sm-9 col-md-9">
      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-comment"></span> Add a Comment
      </button>
      <!-- Rating Stars -->
      <div class="lead stylesm">
        <div id="stars" class="starrr stylesm"></div>
          <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)</span>
        </div>
        <!-- Modal for Comments -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <!-- Modal Comments --> 
                <!-- End Modal Comments -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <hr> <!-- Division between results -->
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9">
      <div id=firstt>
        <h4>Results</h4>
        <span class="style-font"><strong>Login error #x0454545</strong></span>
        <span>
          - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.
          <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-new-window"></span> View Details </button>
        </span>
        <!-- View Details Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Element Details</h4>
              </div>
              <div class="modal-body">
                <!-- View Details Modal Body -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Element Title</h3>
                      <div class="col-md-4">
                        <img src="#" alt="Preview">
                      </div>
                      <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.</p>
                      </div>
                    </div>
                    <section class="col-md-8">
                      <video width="800" height="400">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
                      </video>
                    </section>
                    <section class="col-md-8">
                      <button type="button" class="btn btn-primary btn-lg raised">Download Video</button>
                      <button type="button" class="btn btn-primary btn-lg outline">Download Files</button>
                    </section>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="stylesm col-xs-12 col-sm-9 col-md-9">
      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-comment"></span> Add a Comment</button>
      <!-- Rating Stars -->
      <div class="lead stylesm">
        <div id="stars" class="starrr stylesm"></div>
          <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)</span>
      </div>
      <!-- Modal for Comments -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <!-- Modal Comments -->
              <!-- End Modal Comments -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <hr> <!-- Division between results -->
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9">
      <div id=firstt>
        <h4>Results</h4>
        <span class="style-font"><strong>Login error #x0454545</strong></span>
        <span>
          - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula. <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-new-window"></span> View Details </button>
        </span>
        <!-- View Details Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Element Details</h4>
              </div>
              <div class="modal-body">
                <!-- View Details Modal Body -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Element Title</h3>
                      <div class="col-md-4">
                        <img src="#" alt="Preview">
                      </div>
                      <div class="col-md-4">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat nisl a ligula ornare, vel vulputate tellus aliquet. Etiam in sagittis diam. Sed porta a sapien et suscipit. Donec vel magna ut magna pharetra vehicula. Vivamus varius erat et augue lacinia, at mollis risus ullamcorper. Maecenas interdum auctor vehicula.</p>
                      </div>
                    </div>
                    <section class="col-md-8">
                      <video width="800" height="400">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.
                      </video>
                    </section>
                    <section class="col-md-8">
                      <button type="button" class="btn btn-primary btn-lg raised">Download Video</button>
                      <button type="button" class="btn btn-primary btn-lg outline">Download Files</button>
                    </section>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="stylesm col-xs-12 col-sm-9 col-md-9">
      <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-comment"></span> Add a Comment
      </button>
      <!-- Rating Stars -->
      <div class="lead stylesm">
        <div id="stars" class="starrr stylesm"></div>
          <span class="stylefont-star">You gave a rating of <span class="stylesm" id="count">0</span> star(s)</span>
      </div>
      <!-- Modal for Comments -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <!-- Modal Comments -->
              <!-- End Modal Comments -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <hr> <!-- Division between results -->
    </div>
  </div> <!-- End Container-fluid col-9-->
</div>

<!-- Content -->
@stop

@section('javascript')
{!! Html::script('assets/js/views/busquedas/busquedas.js') !!}
@stop