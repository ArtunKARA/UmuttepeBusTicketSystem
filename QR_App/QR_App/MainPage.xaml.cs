using System;
using System.Net.Http;
using System.Text.Json;
using System.Threading.Tasks;

namespace QR_App
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
            barcodeReader.Options = new ZXing.Net.Maui.BarcodeReaderOptions
            {
                Formats = ZXing.Net.Maui.BarcodeFormat.QrCode,
                AutoRotate = true,
                Multiple = true
            };

        }

        private async void barcodeReader_BarcodesDetected(object sender, ZXing.Net.Maui.BarcodeDetectionEventArgs e)
        {
            var first = e.Results?.FirstOrDefault();

            if (first is null)
                return;

            // QR kodundan elde edilen PNR bilgisi
            var pnr = first.Value;

            // Maui'ye HTTP isteği gönder
            using (var client = new HttpClient())
            {
                try
                {
                    // Maui'nin API URL'si
                    var apiUrl = "MAUI_UYGULAMANIZIN_JSON_API_URLSI";

                    // HTTP GET isteği oluşturma
                    var response = await client.GetAsync($"{apiUrl}?pnr={pnr}");

                    // İstek başarılıysa JSON yanıtını al
                    if (response.IsSuccessStatusCode)
                    {
                        var json = await response.Content.ReadAsStringAsync();

                        // JSON yanıtını işleme
                        // Örneğin, JSON verisini ekrana yazdırma
                        await DisplayAlert("JSON Response", json, "OK");
                    }
                    else
                    {
                        // İstek başarısız ise hata mesajını göster
                        await DisplayAlert("Error", $"HTTP request failed: {response.StatusCode}", "OK");
                    }
                }
                catch (Exception ex)
                {
                    // Hata durumunda hata mesajını göster
                    await DisplayAlert("Error", $"An error occurred: {ex.Message}", "OK");
                }
            }
        }
    }
}
