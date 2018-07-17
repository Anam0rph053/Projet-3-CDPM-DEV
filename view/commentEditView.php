<h2 class="text-center">Commentaires</h2>


<!--Section: Comments-->
<section class="my-5">

    <!-- Card header -->
    <div class="card-header border-0 font-weight-bold">4 comments</div>

    <div class="media d-block d-md-flex mt-4">
        <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
        <div class="media-body text-center text-md-left ml-md-3 ml-0">
            <h5 class="font-weight-bold mt-0">
                <a class="text-default" href=""><?=htmlentities($comment->pseudo); ?></a>
                <a href="" class="pull-right text-default">
                    <i class="fa fa-reply"></i>
                </a>
            </h5>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <div class="media d-block d-md-flex mt-4">
                <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://mdbootstrap.com/img/Photos/Avatars/img (27).jpg" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <h5 class="font-weight-bold mt-0">
                        <a class="text-default" href="">Tommy Smith</a>
                        <a href="" class="pull-right text-default">
                            <i class="fa fa-reply"></i>
                        </a>
                    </h5>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                    ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </div>
            </div>

    <!--Pagination -->
    <nav class="d-flex justify-content-center mt-5">
        <ul class="pagination pagination-circle pg-teal mb-0">

            <!--First-->
            <li class="page-item disabled">
                <a class="page-link">First</a>
            </li>

            <!--Arrow left-->
            <li class="page-item disabled">
                <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <!--Numbers-->
            <li class="page-item active">
                <a class="page-link">1</a>
            </li>
            <li class="page-item">
                <a class="page-link">2</a>
            </li>
            <li class="page-item">
                <a class="page-link">3</a>
            </li>
            <li class="page-item">
                <a class="page-link">4</a>
            </li>
            <li class="page-item">
                <a class="page-link">5</a>
            </li>

            <!--Arrow right-->
            <li class="page-item">
                <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>

            <!--Last-->
            <li class="page-item">
                <a class="page-link">Last</a>
            </li>

        </ul>
    </nav>
    <!--Pagination -->

</section>
<!--Section: Comments-->

<!-- Reply section -->
<section class="my-5">

    <!-- Leave a reply -->
    <div class="card-header border-0 font-weight-bold">Leave a reply</div>

    <!-- Default form reply -->
    <form class="px-1 mt-4">

        <!-- Comment -->
        <div class="md-form">
            <label for="replyFormComment">Your comment</label>
            <textarea class="form-control md-textarea" id="replyFormComment" rows="4"></textarea>
        </div>

        <!-- Name -->
        <div class="md-form mt-5">
            <label for="replyFormName">Your name</label>
            <input type="email" id="replyFormName" class="form-control">
        </div>

        <!-- Email -->
        <div class="md-form mt-5">
            <label for="replyFormEmail">Your e-mail</label>
            <input type="email" id="replyFormEmail" class="form-control">
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-default btn-rounded btn-md" type="submit">Post</button>
        </div>

    </form>
    <!-- Default form reply -->

</section>
<!-- Reply section -->