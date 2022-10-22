<div class="col-sm-6 col-md-3 col-lg-3 blog-entry">
    <b>Services</b>
    <p>Home <b>></b> Services</p>
    <section style="    margin-top: 40px;">
        <b>Filter</b>
        <form action="">
            <input type="email" class="form-control" placeholder="Search salon"
                style="border-radius: 30px;     margin-top: 9px;" />
        </form>
    </section>
    <section style="    margin-top: 40px;">
        <b>Price</b>
        <form class="multi-range-field" style="margin-top: 15px;">

            <div class="rangeslider">
                <input class="min" name="range_1" type="range" min="1" max="100"
                    value="10" />
                <input class="max" name="range_1" type="range" min="1" max="100"
                    value="90" />
                <span class="range_min light left">50 SAR</span>
                <span class="range_max light right">500 SAR</span>
            </div>
        </form>
    </section>
    <section style="    margin-top: 90px;">
        <b>Service Type</b>
        <form class="multi-range-field" style="margin-top: 15px;">
            <input type="checkbox" id="Experts" name="Experts" value="Experts">
            <label for="Experts">Experts</label><br>
            <input type="checkbox" id="Home" name="Home" value="Home">
            <label for="Home">Home</label><br>
            <input type="checkbox" id="Salon" name="Salon" value="Salon">
            <label for="Salon">Salon</label><br>
        </form>
    </section>
    <section>
        <b>Gender</b>
        <form class="multi-range-field" style="margin-top: 15px;">
            <input type="checkbox" id="Men" name="Men" value="Men">
            <label for="Men">Men</label><br>
            <input type="checkbox" id="Women" name="Women" value="Women">
            <label for="Women">Women</label><br>
            <input type="checkbox" id="Both" name="Both" value="Both">
            <label for="Both">Both</label><br>
        </form>
    </section>
    <section>
        <b>Services</b>
        <form class="multi-range-field" style="margin-top: 15px;">
            <input type="checkbox" id="Hairs" name="Hairs" value="Hairs">
            <label for="Hairs">Hairs</label><br>
            <input type="checkbox" id="Skin" checked name="Skin" value="Skin">
            <label for="Skin">Skin</label><br>
            <input type="checkbox" id="Facial" name="Facial" value="Facial">
            <label for="Facial">Facial</label><br>
            <input type="checkbox" id="Nails" name="Nails" value="Nails">
            <label for="Nails">Nails</label><br>
            <input type="checkbox" id="Bride" name="Bride" value="Bride">
            <label for="Bride">Bride</label><br>
            <input type="checkbox" id="Styling" name="Styling" value="Styling">
            <label for="Styling">Styling</label><br>
            <input type="checkbox" id="Hands" name="Hands" value="Hands">
            <label for="Hands">Hands</label><br>
            <input type="checkbox" id="Feet" name="Feet" value="Feet">
            <label for="Salon">Feet</label><br>
        </form>
    </section>
    <section>
        <b>Near by me</b>
        <form class="multi-range-field" style="margin-top: 15px;">
            <input type="checkbox" id="5 km" name="5 km" value="5 km">
            <label for="5 km">5 km</label><br>
            <input type="checkbox" id="10 km" checked name="10 km" value="10 km">
            <label for="10 km">10 km</label><br>
            <input type="checkbox" id="15 km" name="15 km" value="15 km">
            <label for="15 km">15 km</label><br>
        </form>
    </section>
    <section>
        <b>Ratings</b>
        <form class="multi-range-field" style="margin-top: 15px;">
            <input type="checkbox" id="5 stars" name="5 stars" value="5 stars">
            <label for="5 stars">5 stars</label><br>
            <input type="checkbox" id="4 stars" checked name="4 stars" value="4 stars">
            <label for="4 stars">4 stars</label><br>
            <input type="checkbox" id="3 stars" name="3 stars" value="3 stars">
            <label for="3 stars">3 stars</label><br>
            <input type="checkbox" id="Below" name="Below" value="Below">
            <label for="Below">Below</label><br>

        </form>
    </section>
</div>

<style>
    .input:checked {
        background: black !important;
    }

    input[type='range'] {
        width: 210px;
        height: 30px;
        overflow: hidden;
        cursor: pointer;
        outline: none;
    }

    input[type='range'],
    input[type='range']::-webkit-slider-runnable-track,
    input[type='range']::-webkit-slider-thumb {
        -webkit-appearance: none;
        background: none;
    }

    input[type='range']::-webkit-slider-runnable-track {
        width: 200px;
        height: 3px;
        background: #E8F1F6;
    }

    input[type='range']:nth-child(2)::-webkit-slider-runnable-track {
        background: none;
    }

    input[type='range']::-webkit-slider-thumb {
        position: relative;
        height: 15px;
        width: 15px;
        margin-top: -7px;
        background: #22C9B8;
        border: 2px solid #E8F1F6;
        border-radius: 25px;
        z-index: 1;
    }


    input[type='range']:nth-child(1)::-webkit-slider-thumb {
        z-index: 2;
    }

    .rangeslider {
        position: relative;
        height: 60px;
        width: 210px;
        display: inline-block;
        margin-top: -5px;
        margin-left: 20px;
    }

    .rangeslider input {
        position: absolute;
    }

    .rangeslider {
        position: absolute;
    }

    .rangeslider span {
        position: absolute;
        margin-top: 30px;
        left: 0;
    }

    .rangeslider .right {
        position: relative;
        float: right;
        margin-right: -5px;
    }


    /* Proof of concept for Firefox */
    @-moz-document url-prefix() {
        .rangeslider::before {
            content: '';
            width: 100%;
            height: 2px;
            background: #E8F1F6;
            display: block;
            position: relative;
            top: 16px;
        }

        input[type='range']:nth-child(1) {
            position: absolute;
            top: 35px !important;
            overflow: visible !important;
            height: 0;
        }

        input[type='range']:nth-child(2) {
            position: absolute;
            top: 35px !important;
            overflow: visible !important;
            height: 0;
        }

        input[type='range']::-moz-range-thumb {
            position: relative;
            height: 15px;
            width: 15px;
            margin-top: -7px;
            background: #fff;
            border: 2px solid #E8F1F6;
            border-radius: 25px;
            z-index: 1;
        }

        input[type='range']:nth-child(1)::-moz-range-thumb {
            transform: translateY(-20px);
        }

        input[type='range']:nth-child(2)::-moz-range-thumb {
            transform: translateY(-20px);
        }
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    (function() {

        function addSeparator(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }

        function rangeInputChangeEventHandler(e) {
            var rangeGroup = $(this).attr('name'),
                minBtn = $(this).parent().children('.min'),
                maxBtn = $(this).parent().children('.max'),
                range_min = $(this).parent().children('.range_min'),
                range_max = $(this).parent().children('.range_max'),
                minVal = parseInt($(minBtn).val()),
                maxVal = parseInt($(maxBtn).val()),
                origin = $(this).context.className;

            if (origin === 'min' && minVal > maxVal - 5) {
                $(minBtn).val(maxVal - 5);
            }
            var minVal = parseInt($(minBtn).val());
            $(range_min).html(addSeparator(minVal * 5000) + 'SAR');


            if (origin === 'max' && maxVal - 5 < minVal) {
                $(maxBtn).val(5 + minVal);
            }
            var maxVal = parseInt($(maxBtn).val());
            $(range_max).html(addSeparator(maxVal * 5000) + 'SAR');
        }

        $('input[type="range"]').on('input', rangeInputChangeEventHandler);
    })();
</script>
