import torch
from diffusers import AutoPipelineForText2Image

model_id = "stabilityai/sd-turbo"

print("Memuat model AI gambar...")
pipe = AutoPipelineForText2Image.from_pretrained(
    model_id,
    torch_dtype=torch.float32,
    low_cpu_mem_usage=True,
)

pipe.enable_attention_slicing()

print("Membuat poster percobaan...")
image = pipe(
    "Professional promotional poster for a laptop bag, modern design, "
    "dark blue background, studio product photography, vertical layout",
    num_inference_steps=1,
    guidance_scale=0.0,
    height=512,
    width=384,
).images[0]

image.save("poster-test.png")
print("Selesai! Gambar tersimpan sebagai poster-test.png")