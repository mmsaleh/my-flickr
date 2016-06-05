<?php include_once '../includes/admin_header.php'; ?>
<?php require_once '../includes/user.php'; ?>
<?php require_once '../includes/photo.php'; ?>
<?php require_once '../includes/comment.php'; ?>
<?php require_once '../includes/session.php'; ?>

<h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                        <?php
                        if(isset($message)){
                          echo '<div class="alert alert-success alert-dismissible" role="alert">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                        }
                        ?>

                        <div class="row">
                           <div class="col-lg-4">
                               <div class="panel panel-primary">
                                   <div class="panel-heading">
                                       <div class="row">
                                           <div class="col-xs-3">
                                               <i class="fa fa-users fa-5x"></i>
                                           </div>
                                           <div class="col-xs-9 text-right">
                                               <div class="huge"><?php $user = new user();
                                               $u = $user->userCount(); echo $u; ?></div>
                                               <div>Registered Users</div>
                                           </div>
                                       </div>
                                   </div>
                                   <a href="users.php">
                                       <div class="panel-footer">
                                           <span class="pull-left">View Details</span>
                                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                           <div class="clearfix"></div>
                                       </div>
                                   </a>
                               </div>
                           </div>
                           <div class="col-lg-4">
                               <div class="panel panel-green">
                                   <div class="panel-heading">
                                       <div class="row">
                                           <div class="col-xs-3">
                                               <i class="fa fa-image fa-5x"></i>
                                           </div>
                                           <div class="col-xs-9 text-right">
                                               <div class="huge"><?php $photo = new photo();
                                               $p = $photo->photoCount(); echo $p; ?></div>
                                               <div>Images Uploaded</div>
                                           </div>
                                       </div>
                                   </div>
                                   <a href="managePhoto.php">
                                       <div class="panel-footer">
                                           <span class="pull-left">View Details</span>
                                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                           <div class="clearfix"></div>
                                       </div>
                                   </a>
                               </div>
                           </div>
                           <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php $comment = new comment();
                                        $c = $comment->commentCount(); echo $p; ?></div>
                                        <div>New Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                <!-- /.row -->
<?php include_once '../includes/admin_footer.php'; ?>