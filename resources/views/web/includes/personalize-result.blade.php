<section id="personalize-result" class="space-bottom-35">
    <div class="container theme-container">
        <div class="bg-with-mask result-wrap blue-box-shadow">
            <span class="blue-color-mask color-mask-radius"></span>
            <div class="result-box">
                <div class="col-md-4 col-sm-12 personalize">
                    <div class="img-bg">
                        <img src="{{asset('web/assets/img/pattern/result-img.png')}}" alt=" ">
                    </div>
                    <span>Enter your Child's details to personalize results:</span>
                </div>
                <div class="col-md-8 col-sm-12">
                    <form class="personalize-form">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class="sr-only">Enter Child Name</label>
                                <input type="text" class="form-control" placeholder="Enter Child Name">
                            </div>

                            <div class="form-group col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control datetimepicker" name="datetimepicker"
                                           placeholder="Date Of Birth"/>
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>


                            <div class="radio-btn form-group col-sm-4">
                                <label class="radio-btn-inline"><input type="radio" name="optradio">
                                    <span>Girls</span> </label>
                                <label class="radio-btn-inline"><input type="radio" name="optradio">
                                    <span> Boys</span> </label>
                                <button type="submit" class="submit-btn btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
