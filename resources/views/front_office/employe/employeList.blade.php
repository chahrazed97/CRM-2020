@extends('layouts.base')
@section('title', 'List employes')
@section('content')
<!-- Primary table start -->
@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
@endif
<div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Table Primary</h4>
                                <div class="data-tables datatable-primary">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Full_name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>job</th>
                                                <th>note</th>
                                              
                                               
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($employes as $employe)
                                            <tr>
                                                <td>{!! $employe->full_name !!}</td>
                                                <td>{!! $employe->phone !!}</td>
                                                
                                                <td>{!! $employe->email !!}</td>
                                                <td>{!! $employe->job !!}</td>
                                                <td>{!! $employe->note !!}</td>
                                                <td>{!! $employe->full_name !!}</td>
                                                <td>{!! link_to_route('employe.show', 'Voir', [$employe->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td><!-- Large modal -->
 <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Modifier
                                </button>
                                <div class="modal fade bd-example-modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Liste des employes</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                    <form class="needs-validation" novalidate="" action="{{ URL::to('employe/'.$employe->id.'/update' ) }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    
                                       
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3 {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom01">Full name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" name="full_name" placeholder="Full name" value="Mark" required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    {!! $errors->first('full_name', '<small class="help-block">:message</small>') !!}
                                                </div>
                                               
                                               
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-6 {!! $errors->has('country') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom03">Job</label>
                                                    <input type="text" class="form-control" id="validationCustom03" name="job" placeholder="country" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid country.
                                                    </div>
                                                    {!! $errors->first('country', '<small class="help-block">:message</small>') !!} 
                                                </div>
                                                <div class="col-md-6 mb-6 {!! $errors->has('city') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom04">Note</label>
                                                    <input type="text" class="form-control" id="validationCustom04" name="note" placeholder="city" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                    {!! $errors->first('city', '<small class="help-block">:message</small>') !!}
                                                </div>
                                               
                                            </div>

                                            <div class="form-row">
                                               
                                                <div class="col-md-6 mb-6 {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom04">Email</label>
                                                    <input type="email" class="form-control" id="validationCustom04" name="email" placeholder="email" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid email.
                                                    </div>
                                                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="col-md-6 mb-6 {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom05">Phone</label>
                                                    <input type="number" class="form-control" id="validationCustom05" name="phone" placeholder="phone" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid phone number.
                                                    </div>
                                                    {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                                                </div>
                                            </div>
                                         
                                          
                                    </div>
                                </div>
                            </div>
                            <!-- Server side end -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Large modal modal end -->
                       </td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['employe.destroy', $employe->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet employe ?\')']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
                                            
                                        @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                     <tr>
                                     <th>Full_name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>job</th>
                                                <th>note</th>
                                               
                                               
                                                <th></th>
                                                <th></th>
                                     </tr>
                                     </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                            
                        </div>
                        
                        
                      
 <!-- Large modal -->
 <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter Employe
                                </button>
                                <div class="modal fade bd-example-modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Liste des employes</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                    {!! Form::open(['route' => 'employe.store', 'class' => 'needs-validation', 'novalidate' =>'']) !!}
                                    
                                       
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3 {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom01">Full name</label>
                                                    <input type="text" class="form-control" id="validationCustom01" name="full_name" placeholder="Full name" value="Mark" required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                    {!! $errors->first('full_name', '<small class="help-block">:message</small>') !!}
                                                </div>
                                               
                                               
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-6 {!! $errors->has('country') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom03">Job</label>
                                                    <input type="text" class="form-control" id="validationCustom03" name="job" placeholder="country" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid country.
                                                    </div>
                                                    {!! $errors->first('country', '<small class="help-block">:message</small>') !!} 
                                                </div>
                                                <div class="col-md-6 mb-6 {!! $errors->has('city') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom04">Note</label>
                                                    <input type="text" class="form-control" id="validationCustom04" name="note" placeholder="city" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                    {!! $errors->first('city', '<small class="help-block">:message</small>') !!}
                                                </div>
                                               
                                            </div>

                                            <div class="form-row">
                                               
                                                <div class="col-md-6 mb-6 {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom04">Email</label>
                                                    <input type="email" class="form-control" id="validationCustom04" name="email" placeholder="email" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid email.
                                                    </div>
                                                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="col-md-6 mb-6 {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                    <label for="validationCustom05">Phone</label>
                                                    <input type="number" class="form-control" id="validationCustom05" name="phone" placeholder="phone" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid phone number.
                                                    </div>
                                                    {!! $errors->first('phone', '<small class="help-block">:message</small>') !!}
                                                </div>
                                            </div>
                                         
                                          
                                    </div>
                                </div>
                            </div>
                            <!-- Server side end -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            {!! Form::close() !!}
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Large modal modal end -->
                       
                    </div>
                    
                   
                    <!-- Primary table end -->

@endsection