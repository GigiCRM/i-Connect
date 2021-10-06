@extends('layouts.studentnav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">

    
            <a href="{{route('student.showReport')}}" class="btn btn-info" id="record-btn">Weekly log record</a>
            <div class="row" style="display:block;">
		    <table class="table table-hover table-striped" style="text-align:center;">
		        <thead>
		        <tr class="thead-dark">
                    <th>Week</th>
                    <th>Action</th>

		        </tr>
		    </thead>
		        <tbody>	
             

		            <tr>
                        <td>1</td>
                        <td> <a href=" {{route('student.storeReport')}}" class="btn btn-secondary" id="report">Weekly log</a></td>
                       

		            </tr> 

                    <tr>
                        <td>2</td>
                        <td> <a href="{{route('student.storeReport2')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>3</td>
                        <td> <a href="{{route('student.storeReport3')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>4</td>
                        <td> <a href="{{route('student.storeReport4')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>5</td>
                        <td> <a href="{{route('student.storeReport5')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>6</td>
                        <td> <a href="{{route('student.storeReport6')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>7</td>
                        <td> <a href="{{route('student.storeReport7')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>8</td>
                        <td> <a href="{{route('student.storeReport8')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>9</td>
                        <td> <a href="{{route('student.storeReport9')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>10</td>
                        <td> <a href="{{route('student.storeReport10')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>11</td>
                        <td> <a href="{{route('student.storeReport11')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>12</td>
                        <td> <a href="{{route('student.storeReport12')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                    
                    <tr>
                        <td>13</td>
                        <td> <a href="{{route('student.storeReport13')}}" class="btn btn-secondary" id="report">Weekly log</a></td>

		            </tr> 
                   

				
		        </tbody>
		    </table>

	</div>
    </div>
</div>
@endsection