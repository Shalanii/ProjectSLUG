<section class="sec2">
        <div class="container h100">
            <div class="contentBox h100">
                <div class="display">
                    <div class="clock">
                        <h3 class="event_title">Live Event Starts In </h3>
                    <div id="numbers">
                        <span id="days"></span>
                        <span id="hours"></span>
                        <span id="minutes"></span>
                        <span id="seconds"></span>
                    </div>     
                    <div id="units">
                        <span>Days</span>
                        <span>Hours</span>
                        <span>Minutes</span>
                        <span>Seconds</span>
                    </div>
                </div>
                </div>
                <script type="text/javascript">

                    function countDown(){
                        var now=new Date();
                        var eventDate = new Date(2019,08,27);
                        var currentTime = now.getTime();
                        var eventTime = eventDate.getTime();

                        var remTime = eventTime - currentTime;

                        var s = Math.floor(remTime / 1000);
                        var m = Math.floor(s / 60);
                        var h = Math.floor(m / 60);
                        var d = Math.floor(h / 24);

                        h %= 24;
                        m %= 60;
                        s %= 60;

                        h = (h<10) ? "0" + h : h;
                        m = (m<10) ? "0" + m : m;
                        s = (s<10) ? "0" + s : s;
                        
                        document.getElementById("days").textContent = d;
                        document.getElementById("days").innerText = d;
                        document.getElementById("hours").textContent = h;
                        document.getElementById("minutes").textContent = m;
                        document.getElementById("seconds").textContent = s;

                        setTimeout(countDown);
                  }
                  countDown();
                </script>
            </div>
        </div>
    </section>