@extends('layout.main')
{{-- @section('breadcrumb')
@endsection --}}
@section('header-left')
    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Tambah Data Daerah</h4>
    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
@endsection

@section('header-right')
    {{-- <button class="btn btn-primary">Tambah Data Baru</button> --}}
@endsection
@section('mainpage')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    {{-- <h6 class="card-title">Form Input Data</h6> --}}
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#">
                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Basic inputs</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Default text input</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Input with placeholder</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Enter your username...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Read only field</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" readonly value="read only">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Disabled field</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" disabled value="disabled">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Predefined value</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" value="http://">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Disabled autocomplete</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder="Autocomplete is off" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Maximum value</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" maxlength="4" placeholder="Maximum 4 characters">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 cursor-pointer" for="clickable-label">Focus on label click</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="clickable-label" placeholder="Field focus on label click">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Static text</label>
                                        <div class="col-lg-10">
                                            <div class="form-control-plaintext">This is a static text</div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Textarea</label>
                                        <div class="col-lg-10">
                                            <textarea rows="3" cols="3" class="form-control" placeholder="Default textarea"></textarea>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Basic selects</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Single select</label>
                                        <div class="col-lg-10">
                                            <select class="form-control">
                                                <option value="opt1">Default select box</option>
                                                <option value="opt2">Option 2</option>
                                                <option value="opt3">Option 3</option>
                                                <option value="opt4">Option 4</option>
                                                <option value="opt5">Option 5</option>
                                                <option value="opt6">Option 6</option>
                                                <option value="opt7">Option 7</option>
                                                <option value="opt8">Option 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Styled select</label>
                                        <div class="col-lg-10">
                                            <select class="form-control form-control-uniform" data-fouc>
                                                <option value="opt1">Styled select box</option>
                                                <option value="opt2">Option 2</option>
                                                <option value="opt3">Option 3</option>
                                                <option value="opt4">Option 4</option>
                                                <option value="opt5">Option 5</option>
                                                <option value="opt6">Option 6</option>
                                                <option value="opt7">Option 7</option>
                                                <option value="opt8">Option 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Custom BS select</label>
                                        <div class="col-lg-10">
                                            <select class="custom-select">
                                                <option value="opt1">Styled select box</option>
                                                <option value="opt2">Option 2</option>
                                                <option value="opt3">Option 3</option>
                                                <option value="opt4">Option 4</option>
                                                <option value="opt5">Option 5</option>
                                                <option value="opt6">Option 6</option>
                                                <option value="opt7">Option 7</option>
                                                <option value="opt8">Option 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Multiple select</label>
                                        <div class="col-lg-10">
                                            <select multiple="multiple" class="form-control">
                                                <option selected>Amsterdam</option>
                                                <option selected>Atlanta</option>
                                                <option>Baltimore</option>
                                                <option>Boston</option>
                                                <option>Buenos Aires</option>
                                                <option>Calgary</option>
                                                <option selected>Chicago</option>
                                                <option>Denver</option>
                                                <option>Dubai</option>
                                                <option>Frankfurt</option>
                                                <option>Hong Kong</option>
                                                <option>Honolulu</option>
                                                <option>Houston</option>
                                                <option>Kuala Lumpur</option>
                                                <option>London</option>
                                                <option>Los Angeles</option>
                                                <option>Melbourne</option>
                                                <option>Mexico City</option>
                                                <option>Miami</option>
                                                <option>Minneapolis</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Basic file inputs</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Default file input</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control-plaintext">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Styled file input</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control-uniform" data-fouc>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Custom BS file input</label>
                                        <div class="col-lg-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Form helpers</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Text form helpers</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="form-text text-muted">Left aligned helper</span>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="form-text text-muted text-center">Centered helper</span>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="form-text text-muted text-right">Right aligned helper</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Full width badge helpers</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="badge d-block badge-primary form-text text-left">Left aligned badge</span>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="badge d-block badge-danger form-text">Centered badge</span>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <span class="badge d-block badge-info form-text text-right">Right aligned badge</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Block badge helpers</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <div class="d-block form-text">
                                                        <span class="badge badge-primary">Left aligned badge</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <div class="d-block form-text text-center">
                                                        <span class="badge badge-danger">Centered badge</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control">
                                                    <div class="d-block form-text text-right">
                                                        <span class="badge badge-info text-right">Right aligned badge</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Inline text helper</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-6 mt-1 mt-lg-0 align-self-center">
                                                    <span class="text-muted">Inline text helper</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Inline badge helper</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-lg-6 mt-1 mt-lg-0 align-self-center">
                                                    <span class="badge bg-teal">Inline badge helper</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Input icons</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Input with icons</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                        <input type="text" class="form-control form-control-lg" placeholder="Left icon, input large">
                                                        <div class="form-control-feedback form-control-feedback-lg">
                                                            <i class="icon-make-group"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Left icon, input default">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-droplets"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Left icon, input small">
                                                        <div class="form-control-feedback form-control-feedback-sm">
                                                            <i class="icon-pin-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                                        <input type="text" class="form-control form-control-lg" placeholder="Right icon, input large">
                                                        <div class="form-control-feedback form-control-feedback-lg">
                                                            <i class="icon-make-group"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                                        <input type="text" class="form-control" placeholder="Right icon, input default">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-droplets"></i>
                                                        </div>
                                                    </div>

                                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Right icon, input small">
                                                        <div class="form-control-feedback form-control-feedback-sm">
                                                            <i class="icon-pin-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Input with spinners</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                        <input type="text" class="form-control" placeholder="Left spinner">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-spinner2 spinner"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-group-feedback form-group-feedback-right">
                                                        <input type="text" class="form-control" placeholder="Right spinner">
                                                        <div class="form-control-feedback">
                                                            <i class="icon-spinner2 spinner"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Validation states</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 font-weight-semibold text-success">Valid state</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control border-success" placeholder="Valid state">
                                            <span class="form-text text-success">Valid state helper</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 font-weight-semibold text-success">Valid state with icon</label>
                                        <div class="col-lg-10">
                                            <div class="form-group-feedback form-group-feedback-right">
                                                <input type="text" class="form-control border-success" placeholder="Valid state">
                                                <div class="form-control-feedback text-success">
                                                    <i class="icon-checkmark-circle"></i>
                                                </div>
                                            </div>
                                            <span class="form-text text-success">Valid state helper</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 font-weight-semibold text-danger">Invalid state</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control border-danger" placeholder="Invalid state">
                                            <span class="form-text text-danger">Invalid state helper</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2 font-weight-semibold text-danger">Invalid state with icon</label>
                                        <div class="col-lg-10">
                                            <div class="form-group-feedback form-group-feedback-right">
                                                <input type="text" class="form-control border-danger" placeholder="Invalid state">
                                                <div class="form-control-feedback text-danger">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                            </div>
                                            <span class="form-text text-danger">Invalid state helper</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Text options</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Light text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control font-weight-light" placeholder="Input with light text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Semibold text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control font-weight-semibold" placeholder="Input with semibold text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Bold text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control font-weight-bold" placeholder="Input with bold text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Capitalized text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-capitalize" placeholder="Input with capitalized text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Centered text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-center" placeholder="Input with centered text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Right aligned text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-right" placeholder="Input with right aligned text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Uppercase text</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control text-uppercase" placeholder="Input with uppercase text">
                                            <span class="form-text text-muted">Other text options work as well</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Field options</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Tooltip on focus</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" data-popup="tooltip" data-trigger="focus" title="Tooltip on focus" placeholder="Click on input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Tooltip on hover</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" data-popup="tooltip" title="Tooltip on hover" placeholder="Hover on input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Fixed input sizing</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-3">
                                                    <input type="text" class="form-control" placeholder=".col-3">
                                                </div>

                                                <div class="col-4">
                                                    <input type="text" class="form-control" placeholder=".col-4">
                                                </div>

                                                <div class="col-5">
                                                    <input type="text" class="form-control" placeholder=".col-5">
                                                </div>
                                            </div>
                                            <span class="form-text text-muted">Available in 12 columns sizes since it's based on 12 columns grid</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Sizing options</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-form-label-lg col-lg-2">Large size</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control form-control-lg" placeholder=".col-form-label-lg .form-control-lg">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Default size</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" placeholder=".col-form-label .form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-form-label-sm col-lg-2">Small size</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control form-control-sm" placeholder=".col-form-label-sm .form-control-sm">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Inputs only</label>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-lg" type="text" placeholder="Large input height">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="text" placeholder="Default input height">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" placeholder="Small input height">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-lg">
                                                            <option value="opt1">Large select height</option>
                                                            <option value="opt2">Option 2</option>
                                                            <option value="opt3">Option 3</option>
                                                            <option value="opt4">Option 4</option>
                                                            <option value="opt5">Option 5</option>
                                                            <option value="opt6">Option 6</option>
                                                            <option value="opt7">Option 7</option>
                                                            <option value="opt8">Option 8</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="opt1">Default select height</option>
                                                            <option value="opt2">Option 2</option>
                                                            <option value="opt3">Option 3</option>
                                                            <option value="opt4">Option 4</option>
                                                            <option value="opt5">Option 5</option>
                                                            <option value="opt6">Option 6</option>
                                                            <option value="opt7">Option 7</option>
                                                            <option value="opt8">Option 8</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm">
                                                            <option value="opt1">Small select height</option>
                                                            <option value="opt2">Option 2</option>
                                                            <option value="opt3">Option 3</option>
                                                            <option value="opt4">Option 4</option>
                                                            <option value="opt5">Option 5</option>
                                                            <option value="opt6">Option 6</option>
                                                            <option value="opt7">Option 7</option>
                                                            <option value="opt8">Option 8</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Color options</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Text color</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control text-violet" value="Custom text color">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Border color</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control border-teal" placeholder="Custom border color">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2">File input color</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control-uniform-custom">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">Type options</legend>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Datetime</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="datetime-local" name="datetime-local">
                                            <span class="form-text text-muted">Using <code>input type="datetime-local"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" name="date">
                                            <span class="form-text text-muted">Using <code>input type="date"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Month</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="month" name="month">
                                            <span class="form-text text-muted">Using <code>input type="month"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Time</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="time" name="time">
                                            <span class="form-text text-muted">Using <code>input type="time"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Week</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="week" name="week">
                                            <span class="form-text text-muted">Using <code>input type="week"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Number</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" name="number">
                                            <span class="form-text text-muted">Using <code>input type="number"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" name="email">
                                            <span class="form-text text-muted">Using <code>input type="email"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">URL</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="url" name="url">
                                            <span class="form-text text-muted">Using <code>input type="url"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Search</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="search" name="search">
                                            <span class="form-text text-muted">Using <code>input type="search"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tel</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" name="tel">
                                            <span class="form-text text-muted">Using <code>input type="tel"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Color</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="color" name="color">
                                            <span class="form-text text-muted">Using <code>input type="color"</code></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Range</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="range" name="range" min="0" max="10">
                                            <span class="form-text text-muted">Using <code>input type="range"</code></span>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


