<!DOCTYPE html>
<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-3">

            <div class="col-md">
                <div class="ftco-footer-widget mb-8">

                    <h2 class="ftco-heading-2">PupukKita</h2>
                    <p>Pembelian pupuk mudah dan aman.</p>
                    <ul class="ftco-footer-social list-unstyled mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Punya pertanyaan?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">JL. Sri meranti No.79, Tenayan Raya, Pekanbaru, Riau.</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 852 8322 4331</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@PupukKita.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(document).on("click", ".open-modal", function() {
        var x = new Date();
        var myHeading = "<p>I Am Added Dynamically </p>";
        $("#modal-body").html(myHeading + x);
        $('#modal').modal('show');
    });
</script>