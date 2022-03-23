@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>

                    <!-- [Attributes by Finsweet] Mirror input values -->
                    <script defer src="https://cdn.jsdelivr.net/npm/@finsweet/attributes-mirrorinput@1/mirrorinput.js"></script>
                    <style>
                        li,
                        ul {
                            padding: 0;
                            margin: 0;
                        }

                        input {
                            margin: 4px 0;
                            font-family: Arial, sans-serif;
                            font-size: 16px;
                            padding: 5px 4px 4px;
                            height: 30px;
                            width: 350px;
                        }

                        #slot li {
                            font-family: Arial, sans-serif;
                            font-size: 16px;
                            padding: 6px 4px 6px 6px;
                            line-height: normal;
                            height: 30px;
                            overflow: hidden;
                        }

                        #slot_wrapper {
                            position: relative;
                        }

                        .jSlots-wrapper {
                            margin: 4px 0;
                            overflow: hidden;
                            /* to hide the magic */
                            height: 29px;
                            /* whatever the height of your list items are */
                            width: 300px;
                            position: absolute;
                            top: 0px;
                            display: none;
                        }

                        #slot {
                            display: none;
                        }

                    </style>
                    <div class="card-header">{{ __('Picking Player') }}</div>

                    <div class="card-body">
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                        <br />
                        @if (count($data) != 0)
                            <div class="row justify-content-center">
                                <div id="slot_wrapper">
                                    <form action="{{ route('save.pick') }}" method="post">
                                        <input type="text" class="search" name="fs-mirrorinput-element"
                                            value="trigger">
                                        <ul id="slot">
                                            @foreach ($data as $user)
                                                <li>{{ $user->pname }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="submit" style="margin: 10px;">Accept Player</button>
                                        <br />
                                        <br />
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="row justify-content-center">
                                <em>There are no players in the database</em>
                                <br />
                                <br />
                            </div>
                        @endif

                        <button type="button" id="random_location">Pick a player</button>

                        <script type="text/javascript">
                            $(function() {
                                var minta = {!! json_encode($data, JSON_HEX_TAG) !!};
                                const dlist = new Array();
                                for (const [key, value] of Object.entries(minta)) {
                                    dlist.push(value.pname, value.phone_num);
                                }
                                // loop through data
                                const namesList = new Array();
                                for (const [key, value] of Object.entries(minta)) {
                                    namesList.push(value.pname)
                                }
                                // console.log(dlist);
                                // console.log(namesList);

                                var msa = namesList,
                                    $input = $('input'),
                                    random_index;

                                //make list for slots recursively and call spin when complete
                                function makeSlotList(list) {
                                    //could choose one random index and then populate with next 18 values instead, but need to account for looping at end
                                    if (list.length < namesList.length) { //length chosen based on appearance of spin, can be changed
                                        var index = _.random(msa.length - 1);
                                        if (list.length === 1) {
                                            /*
                                                This index will be second item in the list, which is our winning number
                                                Save this for future reference
                                                Instead of saving it, we could get the index attribute from the list item we end on
                                            */
                                            random_index = index;
                                        }
                                        list.push('<li index=' + _.random(msa.length - 1) + '>' + msa[index] + '</li>');
                                        return makeSlotList(list);
                                    } else {
                                        //slot list is complete
                                        //clear search field
                                        $input.val('');
                                        //attach list, show jslots, run animation
                                        $('#slot').html(list.join('')).parent().show().trigger('spin');
                                        return list;
                                    }
                                }

                                //before spinning, build out list to spin through and insert into the DOM
                                function makeSlots() {
                                    //start with current value
                                    var list = ['<li>' + $input.val() + '</li>'];

                                    //call recursive list builder that won't spin slots until it's finished
                                    makeSlotList(list);
                                }

                                $('#slot').jSlots({
                                    number: 1,
                                    spinner: '.jSlots-wrapper',
                                    spinEvent: 'spin',
                                    time: 1000,
                                    loops: 3,
                                    endNum: 2, //spins backwards through the list. endNum 1 ends on the same value we started on
                                    onEnd: function(finalElement) {
                                        //set result
                                        $input.val(msa[random_index]);
                                        //hide spinner
                                        $(this.spinner).hide();
                                    }
                                });

                                //bind random button
                                $('#random_location').on('click', makeSlots);
                            });
                        </script>
                        <script>
                            jQuery.easing['jswing'] = jQuery.easing['swing'];

                            jQuery.extend(jQuery.easing, {
                                def: 'easeOutQuad',
                                swing: function(x, t, b, c, d) {
                                    //alert(jQuery.easing.default);
                                    return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
                                },
                                easeOutQuad: function(x, t, b, c, d) {
                                    return -c * (t /= d) * (t - 2) + b;
                                }
                            });

                            /*
                             * jQuery jSlots Plugin
                             * http://matthewlein.com/jslot/
                             * Copyright (c) 2011 Matthew Lein
                             * Version: 1.0.2 (7/26/2012)
                             * Dual licensed under the MIT and GPL licenses
                             * Requires: jQuery v1.4.1 or later
                             */

                            (function($) {

                                $.jSlots = function(el, options) {

                                    var base = this;

                                    base.$el = $(el);
                                    base.el = el;

                                    base.$el.data("jSlots", base);

                                    base.init = function() {

                                        base.options = $.extend({}, $.jSlots.defaultOptions, options);

                                        base.setup();
                                        base.bindEvents();

                                    };


                                    // --------------------------------------------------------------------- //
                                    // DEFAULT OPTIONS
                                    // --------------------------------------------------------------------- //

                                    $.jSlots.defaultOptions = {
                                        number: 3, // Number: number of slots
                                        winnerNumber: 1, // Number or Array: list item number(s) upon which to trigger a win, 1-based index, NOT ZERO-BASED
                                        spinner: '', // CSS Selector: element to bind the start event to
                                        spinEvent: 'click', // String: event to start slots on this event
                                        onStart: $.noop, // Function: runs on spin start,
                                        onEnd: $
                                            .noop, // Function: run on spin end. It is passed (finalNumbers:Array). finalNumbers gives the index of the li each slot stopped on in order.
                                        onWin: $
                                            .noop, // Function: run on winning number. It is passed (winCount:Number, winners:Array)
                                        easing: 'swing', // String: easing type for final spin
                                        time: 90000, // Number: total time of spin animation
                                        loops: 10 // Number: times it will spin during the animation
                                    };

                                    // --------------------------------------------------------------------- //
                                    // HELPERS
                                    // --------------------------------------------------------------------- //

                                    base.randomRange = function(low, high) {
                                        return Math.floor(Math.random() * (1 + high - low)) + low;
                                    };

                                    // --------------------------------------------------------------------- //
                                    // VARS
                                    // --------------------------------------------------------------------- //

                                    base.isSpinning = false;
                                    base.spinSpeed = 0;
                                    base.winCount = 0;
                                    base.doneCount = 0;

                                    base.$liHeight = 0;
                                    base.$liWidth = 0;

                                    base.winners = [];
                                    base.allSlots = [];

                                    // --------------------------------------------------------------------- //
                                    // FUNCTIONS
                                    // --------------------------------------------------------------------- //


                                    base.setup = function() {

                                        // set sizes

                                        var $list = base.$el;
                                        var $li = $list.find('li').first();

                                        base.$liHeight = $li.outerHeight();
                                        base.$liWidth = $li.outerWidth();

                                        base.liCount = base.$el.children().length;

                                        base.listHeight = base.$liHeight * base.liCount;

                                        base.increment = (base.options.time / base.options.loops) / base.options.loops;

                                        $list.css('position', 'relative');

                                        $li.clone().appendTo($list);

                                        base.$wrapper = $list.wrap('<div class="jSlots-wrapper"></div>').show().parent();

                                        // remove original, so it can be recreated as a Slot
                                        base.$el.remove();

                                        // clone lists
                                        for (var i = base.options.number - 1; i >= 0; i--) {
                                            base.allSlots.push(new base.Slot());
                                        }

                                    };

                                    base.bindEvents = function() {
                                        $(base.options.spinner).bind(base.options.spinEvent, function(event) {
                                            if (!base.isSpinning) {
                                                base.playSlots();
                                            }
                                        });
                                    };

                                    // Slot contstructor
                                    base.Slot = function() {

                                        this.spinSpeed = 0;
                                        this.el = base.$el.clone().appendTo(base.$wrapper)[0];
                                        this.$el = $(this.el);
                                        this.loopCount = 0;
                                        this.number = 0;

                                    };


                                    base.Slot.prototype = {

                                        // do one rotation
                                        spinEm: function() {

                                            var that = this;

                                            that.$el
                                                .css('top', -base.listHeight)
                                                .animate({
                                                    'top': '0px'
                                                }, that.spinSpeed, 'linear', function() {
                                                    that.lowerSpeed();
                                                });

                                        },

                                        lowerSpeed: function() {

                                            this.spinSpeed += base.increment;
                                            this.loopCount++;

                                            if (this.loopCount < base.options.loops) {

                                                this.spinEm();

                                            } else {

                                                this.finish();

                                            }
                                        },

                                        // final rotation
                                        finish: function() {

                                            var that = this;
                                            var endNum = base.options.hasOwnProperty('endNum') ? base.options.endNum : base
                                                .randomRange(1, base.liCount);

                                            var finalPos = -((base.$liHeight * endNum) - base.$liHeight);
                                            var finalSpeed = ((this.spinSpeed * 0.5) * (base.liCount)) / endNum;

                                            that.$el
                                                .css('top', -base.listHeight)
                                                .animate({
                                                    'top': finalPos
                                                }, finalSpeed, base.options.easing, function() {
                                                    base.checkWinner(endNum, that);
                                                });

                                        }

                                    };

                                    base.checkWinner = function(endNum, slot) {

                                        base.doneCount++;
                                        // set the slot number to whatever it ended on
                                        slot.number = endNum;

                                        // if its in the winners array
                                        if (
                                            ($.isArray(base.options.winnerNumber) && base.options.winnerNumber.indexOf(endNum) > -
                                                1) ||
                                            endNum === base.options.winnerNumber
                                        ) {

                                            // its a winner!
                                            base.winCount++;
                                            base.winners.push(slot.$el);

                                        }

                                        if (base.doneCount === base.options.number) {

                                            var finalNumbers = [];

                                            $.each(base.allSlots, function(index, val) {
                                                finalNumbers[index] = val.number;
                                            });

                                            if ($.isFunction(base.options.onEnd)) {
                                                base.options.onEnd(finalNumbers);
                                            }

                                            if (base.winCount && $.isFunction(base.options.onWin)) {
                                                base.options.onWin(base.winCount, base.winners, finalNumbers);
                                            }
                                            base.isSpinning = false;
                                        }
                                    };


                                    base.playSlots = function() {

                                        base.isSpinning = true;
                                        base.winCount = 0;
                                        base.doneCount = 0;
                                        base.winners = [];

                                        if ($.isFunction(base.options.onStart)) {
                                            base.options.onStart();
                                        }

                                        $.each(base.allSlots, function(index, val) {
                                            this.spinSpeed = 0;
                                            this.loopCount = 0;
                                            this.spinEm();
                                        });

                                    };


                                    base.onWin = function() {
                                        if ($.isFunction(base.options.onWin)) {
                                            base.options.onWin();
                                        }
                                    };


                                    // Run initializer
                                    base.init();
                                };


                                // --------------------------------------------------------------------- //
                                // JQUERY FN
                                // --------------------------------------------------------------------- //

                                $.fn.jSlots = function(options) {
                                    if (this.length) {
                                        return this.each(function() {
                                            (new $.jSlots(this, options));
                                        });
                                    }
                                };

                            })(jQuery);
                        </script>
                    </div>
                </div>
                <br />
                <br />
            </div>
        </div>
    </div>
@endsection
