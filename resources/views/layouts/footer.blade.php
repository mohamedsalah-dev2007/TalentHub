<!-- resources/views/layouts/footer.blade.php -->
<footer style="background-color: #0c4a60;" class="border-t border-sky-900 py-12 mt-20 text-white">
    <div style="max-width: 1150px; margin: 0 auto; padding: 0 16px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 32px; align-items: start; margin-bottom: 32px;">
            
            <!-- Column 1: About -->
            <div>
                <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 12px; letter-spacing: 1px;">
                    Talent<span style="color: #7dd3fc;">Hub</span>
                </h3>
                <p style="font-size: 13px; color: #bae6fd; line-height: 1.6;">
                    The ultimate platform connecting top talents and employers. Find your next opportunity and track applications seamlessly.
                </p>
            </div>

            <!-- Column 2: Contact Info -->
            <div>
                <h4 style="font-size: 15px; font-weight: bold; margin-bottom: 12px; color: #e0f2fe;">Contact Us</h4>
                <p style="font-size: 13px; color: #bae6fd; margin-bottom: 8px;">Email: support@talenthub.com</p>
                <p style="font-size: 13px; color: #bae6fd; margin-bottom: 8px;">Phone: +20 100 000 0000</p>
                <p style="font-size: 13px; color: #bae6fd;">Support Available 24/7</p>
            </div>

            <!-- Column 3: Quick Links / Policies -->
            <div>
                <h4 style="font-size: 15px; font-weight: bold; margin-bottom: 12px; color: #e0f2fe;">Quick Links</h4>
                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
                    <a href="#" style="color: #bae6fd; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#bae6fd'">Privacy Policy</a>
                    <a href="#" style="color: #bae6fd; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#bae6fd'">Terms of Service</a>
                    <a href="#" style="color: #bae6fd; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#bae6fd'">About Us</a>
                </div>
            </div>

        </div>

        <!-- Divider -->
        <div style="width: 100%; height: 1px; background-color: rgba(255, 255, 255, 0.15); margin-bottom: 20px;"></div>

        <!-- Copyright -->
        <div style="text-align: center; font-size: 12px; color: #bae6fd;">
            &copy; {{ date('Y') }} TalentHub. All rights reserved. Built with passion by Mohamed Jaafar.
        </div>
    </div>
</footer>