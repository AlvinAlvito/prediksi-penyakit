<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="/images/favicon-32x32.png"
    />

    <link rel="stylesheet" href="/css/style.css" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />

    <title>Prediksi Penyakit</title>
  </head>
  <body>
    <main>
	<!-- Sidebar -->
      <div class="sidebar">
        <div class="step">
          <input
            class="stepRadio"
            step="1"
            value="1"
            type="radio"
            name="step"
            checked
          />
          <div class="stepNumber">1</div>
          <div class="stepCaption">Step 1</div>
          <div class="stepName">Data Diri</div>
        </div>
        <div class="step">
          <input
            class="stepRadio"
            step="2"
            value="2"
            type="radio"
            name="step"
          />
          <div class="stepNumber">2</div>
          <div class="stepCaption">Step 2</div>
          <div class="stepName">Gejala Dasar</div>
        </div>
        <div class="step">
          <input
            class="stepRadio"
            step="3"
            value="3"
            type="radio"
            name="step"
          />
          <div class="stepNumber">3</div>
          <div class="stepCaption">Step 3</div>
          <div class="stepName">Gejala Spesifik</div>
        </div>
        <div class="step">
          <input
            class="stepRadio"
            step="4"
            value="4"
            type="radio"
            name="step"
          />
          <div class="stepNumber">4</div>
          <div class="stepCaption">Step 4</div>
          <div class="stepName">Hasil Analisis Penyakit</div>
        </div>
      </div>
	  <!-- colse sidebar -->

	  <!-- Form -->
      <div class="form">

		<!-- Step 1 -->
        <div class="formStep">
          <h1 class="formTitle">Data Diri</h1>
          <div class="formDescription">
            Sihlakan Masukan Identitas Data Diri Anda.
          </div>
          <div class="formInputs mb-0">
            <label for="name" class="inputLabel">Jenis Kelamin</label>
            <div class="formInputs m-0">
              <div class="radioOptions">
                <div class="option">
                  <input
                    type="radio"
                    name="plan"
                    class="input-plan"
                    value="arcade"
                    checked
                  />
                  <svg
                    class="optionIcon"
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 40 40"
                  >
                    <g fill="none" fill-rule="evenodd">
                      <circle cx="20" cy="20" r="20" fill="#FFAF7E" />
                      <path
                        fill="#FFF"
                        fill-rule="nonzero"
                        d="M24.995 18.005h-3.998v5.998h-2v-5.998H15a1 1 0 0 0-1 1V29a1 1 0 0 0 1 1h9.995a1 1 0 0 0 1-1v-9.995a1 1 0 0 0-1-1Zm-5.997 8.996h-2v-1.999h2v2Zm2-11.175a2.999 2.999 0 1 0-2 0v2.18h2v-2.18Z"
                      />
                    </g>
                  </svg>
                  <div class="optionName">Pria</div>
                </div>
                <div class="option">
                  <input
                    type="radio"
                    name="plan"
                    class="input-plan"
                    value="advanced"
                  />
                  <svg
                    class="optionIcon"
                    xmlns="http://www.w3.org/2000/svg"
                    width="40"
                    height="40"
                    viewBox="0 0 40 40"
                  >
                    <g fill="none" fill-rule="evenodd">
                      <circle cx="20" cy="20" r="20" fill="#F9818E" />
                      <path
                        fill="#FFF"
                        fill-rule="nonzero"
                        d="M25.057 15H14.944C12.212 15 10 17.03 10 19.885c0 2.857 2.212 4.936 4.944 4.936h10.113c2.733 0 4.943-2.08 4.943-4.936S27.79 15 25.057 15ZM17.5 20.388c0 .12-.108.237-.234.237h-1.552v1.569c0 .126-.138.217-.259.217H14.5c-.118 0-.213-.086-.213-.203v-1.583h-1.569c-.126 0-.217-.139-.217-.26v-.956c0-.117.086-.213.202-.213h1.584v-1.554c0-.125.082-.231.203-.231h.989c.12 0 .236.108.236.234v1.551h1.555c.125 0 .231.083.231.204v.988Zm5.347.393a.862.862 0 0 1-.869-.855c0-.472.39-.856.869-.856.481 0 .87.384.87.856 0 .471-.389.855-.87.855Zm1.9 1.866a.86.86 0 0 1-.87-.852.86.86 0 0 1 .87-.855c.48 0 .87.38.87.855a.86.86 0 0 1-.87.852Zm0-3.736a.862.862 0 0 1-.87-.854c0-.472.39-.856.87-.856s.87.384.87.856a.862.862 0 0 1-.87.854Zm1.899 1.87a.862.862 0 0 1-.868-.855c0-.472.389-.856.868-.856s.868.384.868.856a.862.862 0 0 1-.868.855Z"
                      />
                    </g>
                  </svg>
                  <div class="optionName">Wanita</div>
                </div>
              </div>
            </div>

            <div class="inputBlock" field="name">
              <label for="name" class="inputLabel">Nama</label>
              <label for="name" class="inputMessage"></label>
              <input
                class="formInput"
                required
                type="text"
                name="name"
                id="input-name"
                placeholder="Udin Petot"
				value="Udin Petot"
              />
            </div>

            <div class="inputBlock" field="phone">
              <label for="phone">Usia</label>
              <label for="name" class="inputMessage"></label>
              <input
                class="formInput"
                required
                type="tel"
                name="phone"
                id="input-phone"
                placeholder="56"
				value="56"
              />
            </div>

          </div>
        </div>
		<!-- close step 1 -->

		<!-- step 2 -->
        <div class="formStep">
          <h1 class="formTitle">Pilih Gejala Dasar</h1>
          <div class="formDescription">
            Sihlakan Pilih gejala Dasar yang Anda Alami Saat ini.
          </div>
		  <div class="formInputs">
            <div class="checkboxOptions">
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="online-service"
                  checked
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Online service</div>
                <div class="optionDescription">Access to multiplayer games</div>
                <div class="optionPrice" monthly="1" yearly="10"></div>
              </div>
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="larger-storage"
                  checked
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Larger storage</div>
                <div class="optionDescription">Extra 1TB of cloud save</div>
                <div class="optionPrice" monthly="2" yearly="20"></div>
              </div>
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="customizable-profile"
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Customizable Profile</div>
                <div class="optionDescription">
                  Custom theme on your profile
                </div>
                <div class="optionPrice" monthly="2" yearly="20"></div>
              </div>
            </div>
          </div>
        </div>
		<!-- close step 2 -->

		<!-- step 3 -->
        <div class="formStep">
          <h1 class="formTitle">Pilih Gejala Spesifik Anda</h1>
          <div class="formDescription">
            Sihlakan Pilih gejala Spesifik yang Anda Alami Saat ini.
          </div>
		  <div class="formInputs">
            <div class="checkboxOptions">
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="online-service"
                  checked
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Online service</div>
                <div class="optionDescription">Access to multiplayer games</div>
                <div class="optionPrice" monthly="1" yearly="10"></div>
              </div>
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="larger-storage"
                  checked
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Larger storage</div>
                <div class="optionDescription">Extra 1TB of cloud save</div>
                <div class="optionPrice" monthly="2" yearly="20"></div>
              </div>
              <div class="option">
                <input
                  type="checkbox"
                  class="input-addons"
                  value="customizable-profile"
                />
                <div class="optionCheckbox"></div>
                <div class="optionTitle">Customizable Profile</div>
                <div class="optionDescription">
                  Custom theme on your profile
                </div>
                <div class="optionPrice" monthly="2" yearly="20"></div>
              </div>
            </div>
          </div>
        </div>
		<!-- close step 3 -->
		
        <div class="formStep thanks">
           <svg
            xmlns="http://www.w3.org/2000/svg"
            width="80"
            height="80"
            viewBox="0 0 80 80"
          >
            <g fill="none">
              <circle cx="40" cy="40" r="40" fill="#F9818E" />
              <path
                fill="#E96170"
                d="M48.464 79.167c.768-.15 1.53-.321 2.288-.515a40.04 40.04 0 0 0 3.794-1.266 40.043 40.043 0 0 0 3.657-1.63 40.046 40.046 0 0 0 12.463-9.898A40.063 40.063 0 0 0 78.3 51.89c.338-1.117.627-2.249.867-3.391L55.374 24.698a21.6 21.6 0 0 0-15.332-6.365 21.629 21.629 0 0 0-15.344 6.365c-8.486 8.489-8.486 22.205 0 30.694l23.766 23.775Z"
              />
              <path
                fill="#FFF"
                d="M40.003 18.333a21.58 21.58 0 0 1 15.31 6.351c8.471 8.471 8.471 22.158 0 30.63-8.47 8.47-22.156 8.47-30.627 0-8.47-8.472-8.47-22.159 0-30.63a21.594 21.594 0 0 1 15.317-6.35Zm9.865 15c-.316.028-.622.15-.872.344l-12.168 9.13-5.641-5.642c-1.224-1.275-3.63 1.132-2.356 2.356l6.663 6.663c.56.56 1.539.63 2.173.156l13.326-9.995c1.122-.816.43-2.993-.956-3.013a1.666 1.666 0 0 0-.17 0Z"
              />
            </g>
          </svg>
          <h1>Hasil Analisis Penyakit </h1>
          <article>
            Thanks for confirming your subscription! We hope you have fun using
            our platform. If you ever need support, please feel free to email us
            at support@loremgaming.com.
          </article>
         
        </div>


        <div class="stepButtons">
          <div class="button ghost back">
            <input
              class="stepRadio"
              value="1"
              step="2"
              type="radio"
              name="step"
            />
            <input
              class="stepRadio"
              value="2"
              step="3"
              type="radio"
              name="step"
            />
            <input
              class="stepRadio"
              value="3"
              step="4"
              type="radio"
              name="step"
            />
          </div>
          <div class="button submit">
            <input
              class="stepRadio"
              step="1"
              value="2"
              type="radio"
              name="step"
            />
            <input
              class="stepRadio"
              step="2"
              value="3"
              type="radio"
              name="step"
            />
            <input
              class="stepRadio"
              step="3"
              value="4"
              type="radio"
              name="step"
            />
            <input
              class="stepRadio"
              step="4"
              value="submit"
              type="radio"
              name="step"
            />

            <input class="stepCheck" step="1" type="checkbox" />
            <input class="stepCheck" step="2" type="checkbox" />
            <input class="stepCheck" step="3" type="checkbox" />
            <input class="stepCheck" step="4" type="checkbox" />
          </div>
        </div>
      </div>
    </main>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"
  ></script>
</html>
