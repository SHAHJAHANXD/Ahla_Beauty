@extends('front.layout')
@section('title')
    Ahla Beauty Services
@endsection
@section('content')
    <style>
        .counter {
            width: 150px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #BFFFF9;
            border-radius: 5px;
        }

        .counter input {
            width: 50px;
            border: 0;
            line-height: 30px;
            font-size: 20px;
            text-align: center;
            color: black;
            appearance: none;
            background: #BFFFF9;
            outline: 0;
        }

        .counter span {
            display: block;
            font-size: 25px;
            padding: 0 10px;
            cursor: pointer;
            color: black;
            user-select: none;
        }

        .calendar {
            --side-padding: 20px;
            --border-radius: 34px;
            --accent-br: 15px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px 3px #aaa;
        }

        .calendar select {
            background-color: #f3f4f6;
            padding: 15px 20px;
        }

        .calendar__opts,
        .calendar__buttons {
            background-color: #fff;
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 15px;
        }

        .calendar__opts {
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
            padding: 20px var(--side-padding);
        }



        .calendar__days {
            background-color: #fff;

            padding: 0 var(--side-padding) 10px;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .calendar__days>div {
            text-align: center;
            font-weight: 700;
            font-size: 1.02rem;
            color: black;
        }

        .calendar__dates {
            padding: 10px var(--side-padding);
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .calendar__date {
            --height: calc(400px / 6 - var(--side-padding));
            text-align: center;
            height: var(--height);
            line-height: var(--height);
            font-weight: 600;
            font-size: 1.02rem;
            cursor: pointer;
            position: relative;
        }

        .calendar__date::before {
            content: "";
            position: absolute;
            background-color: rgba(255, 255, 255, 0);
            width: 100%;
            height: calc(var(--height) * 0.9);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: var(--accent-br);
            transition: background-color 0.3s ease;
        }

        .calendar__date:not(.calendar__date--selected):not(.calendar__date--grey):hover::before {
            background-color: #ededed;
        }

        .calendar__date--grey {
            color: #c5c8ca;
            cursor: not-allowed;
        }

        .calendar__date--selected {
            color: #ff374b;
        }

        .calendar__date--selected::before {
            background-color: #ffeaec;
            border-radius: 0px;
        }

        .calendar__date--first-date::before {
            border-top-left-radius: var(--accent-br);
            border-bottom-left-radius: var(--accent-br);
        }

        .calendar__date--last-date::before {
            border-top-right-radius: var(--accent-br);
            border-bottom-right-radius: var(--accent-br);
        }

        .calendar__date--range-start::after {
            content: "";
            position: absolute;
            bottom: 3px;
            border-radius: 24px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ff374b;
            width: 10px;
            height: 4px;
        }

        .calendar__date--range-end {
            color: #fff;
        }

        .calendar__date--range-end::before {
            box-shadow: 0 15px 20px -3px rgba(255, 55, 75, 0.35);
            background-color: #ff374b;
            border-radius: var(--accent-br);
            z-index: 1;
        }

        .calendar__date--range-end::after {
            content: "";
            position: absolute;
            height: calc(var(--height) * 0.9);
            background-color: #ffeaec;
            width: 50px;
            top: 50%;
            right: 50%;
            transform: translateY(-50%);
        }

        .calendar__date span {
            position: relative;
            z-index: 1;
        }

        .calendar__buttons {
            padding: 10px var(--side-padding) 20px;
            border-bottom-left-radius: var(--border-radius);
            border-bottom-right-radius: var(--border-radius);
        }

        .calendar__button {
            cursor: pointer;
        }

        .calendar__button--grey {
            background-color: #f3f4f6;
        }

        .calendar__button--primary {
            background-color: #1752ff;
            color: #fff;
            transition: box-shadow 0.3s cubic-bezier(0.21, 0.68, 0.09, 0.27), transform 0.2s linear;
        }

        .calendar__button--primary:hover {
            box-shadow: 0 20px 30px -13px rgba(23, 82, 255, 0.45);
            transform: translateY(-3px);
        }

        .calendar__button--primary:active {
            box-shadow: 0 10px 10px -6px rgba(23, 82, 255, 0.45);
            transform: translateY(-1px);
        }



        select,
        button {
            font-family: inherit;
            font-weight: 700;
            font-size: 1.02rem;
            border-radius: 20px;
            outline: none;
            border: 0;
            padding: 15px 20px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        select {
            background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='960px' height='560px' viewBox='0 0 960 560' enable-background='new 0 0 960 560' xml:space='preserve'%3E%3Cg id='Rounded_Rectangle_33_copy_4_1_'%3E%3Cpath d='M480,344.181L268.869,131.889c-15.756-15.859-41.3-15.859-57.054,0c-15.754,15.857-15.754,41.57,0,57.431l237.632,238.937 c8.395,8.451,19.562,12.254,30.553,11.698c10.993,0.556,22.159-3.247,30.555-11.698l237.631-238.937 c15.756-15.86,15.756-41.571,0-57.431s-41.299-15.859-57.051,0L480,344.181z'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 24px;
            background-repeat: no-repeat;
            background-position: calc(100% - var(--side-padding)) center;
        }
    </style>
    <div class="container">
        <div class="hero">
            <div class="map">
                <img src="{{ asset('assets/images/ahla/Rectangle 4296.png') }}" alt="Image" class="img-fluid"
                    style="margin-top: 120px;">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h1 class="heading" style="font-weight: 600; color: black; margin-top: 20px;">Light Ash Salon</h1>
                        <div style="margin-top: 10px;">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">

                    </div>
                    <div class="col-lg-4 col-sm-12 text-end">
                        <h1 class="" style="font-weight: 600; color: white; margin-top: 20px;"><a href=""
                                class="open_btn"> Open</a></h1>
                        <br>
                        <b class="" style="font-weight: 600; color: black; margin-top: 20px;">Timings : 1 pm -8 pm</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-9 blog-entry">
                    <b style="font-size: 25px;"> Services</b>
                    <p>Home <b>></b> Services <b>></b> Light Ash Salon <b>></b> Book Now </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-9 blog-entry">
                    <b style="font-size: 25px;"> Choose a Date</b>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-12">
                    <div class="calendar">
                        <div class="calendar__opts">
                            <div class="div" style="text-align: end">
                                <select name="calendar__month" id="calendar__month" style="width: 120px; color: #22C9B8">
                                    <option selected>Jan</option>
                                    <option>Feb</option>
                                    <option>Mar</option>
                                    <option>Apr</option>
                                    <option>May</option>
                                    <option>Jun</option>
                                    <option>Jul</option>
                                    <option>Aug</option>
                                    <option>Sep</option>
                                    <option>Oct</option>
                                    <option>Nov</option>
                                    <option>Dec</option>
                                </select>
                            </div>
                            <select name="calendar__year" id="calendar__year" style="width: 120px;">
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option selected>2022</option>
                            </select>
                        </div>

                        <div class="calendar__body">
                            <div class="calendar__days">
                                <div>M</div>
                                <div>T</div>
                                <div>W</div>
                                <div>T</div>
                                <div>F</div>
                                <div>S</div>
                                <div>S</div>
                            </div>

                            <div class="calendar__dates">
                                <div class="calendar__date calendar__date--grey"><span>27</span></div>
                                <div class="calendar__date calendar__date--grey"><span>28</span></div>
                                <div class="calendar__date calendar__date--grey"><span>29</span></div>
                                <div class="calendar__date calendar__date--grey"><span>30</span></div>
                                <div class="calendar__date"><span>1</span></div>
                                <div class="calendar__date"><span>2</span></div>
                                <div class="calendar__date"><span>3</span></div>
                                <div class="calendar__date"><span>4</span></div>
                                <div class="calendar__date"><span>5</span></div>
                                <div class="calendar__date"><span>6</span></div>
                                <div class="calendar__date"><span>7</span></div>
                                <div class="calendar__date"><span>8</span></div>
                                <div class="calendar__date"><span>9</span></div>
                                <div class="calendar__date"><span>10</span></div>
                                <div class="calendar__date"><span>11</span></div>
                                <div class="calendar__date"><span>12</span></div>
                                <div class="calendar__date"><span>13</span></div>
                                <div class="calendar__date"><span>14</span></div>
                                <div class="calendar__date"><span>15</span></div>
                                <div class="calendar__date"><span>16</span></div>
                                <div class="calendar__date"><span>17</span></div>
                                <div class="calendar__date"><span>18</span></div>
                                <div class="calendar__date"><span>19</span></div>
                                <div class="calendar__date"><span>20</span></div>
                                <div class="calendar__date"><span>21</span></div>
                                <div class="calendar__date"><span>22</span></div>
                                <div class="calendar__date"><span>23</span></div>
                                <div class="calendar__date"><span>24</span></div>
                                <div class="calendar__date"><span>25</span></div>
                                <div class="calendar__date"><span>26</span></div>
                                <div class="calendar__date"><span>27</span></div>
                                <div class="calendar__date"><span>28</span></div>
                                <div class="calendar__date"><span>29</span></div>
                                <div class="calendar__date"><span>30</span></div>
                                <div class="calendar__date"><span>31</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-9 blog-entry">
                    <b style="font-size: 25px;">Pick a time</b>
                </div>
            </div>
            <div class="row" style="padding: 30px; margin-bottom: 50px;  border-radius: 10px;margin-top: 20px;">
                <div class="col-lg-12">
                    <div class="calendar">
                        <div class="row">
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">9:30</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">10:00</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">10:30</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">11:00</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">11:30</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">12:00</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">12:30</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">1:00</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">1:30</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">2:00</a>
                            </div>
                            <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">2:30</a>
                            </div> <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">3:00</a>
                            </div> <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">3:30</a>
                            </div> <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">4:00</a>
                            </div> <div class="col-lg-2" style="text-align: center;     text-align: center;
                            margin-top: 50px;
                            margin-bottom: 50px;">
                                <a href=""
                                    style="    border-radius: 10px;
                            background: #F3F2F5;
                            padding: 11px 40px;">4:30</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>All Times are in Eastern Time - US & Canada</p>
                </div>
                <div class="col-lg-12">
                    <p style="text-align: center;margin-top: 40px;">
                        <a href="{{ route('home') }}" class="visit_btn"
                            style="    padding: 10px 70px; margin-left: 30px;     margin-right: 50px;">Back</a>
                            <a class="visit_btn"
                            style="background: #263238; padding: 10px 70px;">Continue</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        function increaseCount(a, b) {
            var input = b.previousElementSibling;
            var value = parseInt(input.value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            input.value = value;
        }

        function decreaseCount(a, b) {
            var input = b.nextElementSibling;
            var value = parseInt(input.value, 10);
            if (value > 1) {
                value = isNaN(value) ? 0 : value;
                value--;
                input.value = value;
            }
        }
    </script>
@endsection
