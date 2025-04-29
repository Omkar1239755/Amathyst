
@extends('layouts.layout')
@section('content')

<body>

	<section class="associateprofile">
		<div class="container">
			<div class="row">
				<div class="col-md-6 assoiate-left d-flex align-items-center justify-content-center"> <img
						class="image-assoiate" src="{{asset('assests/images/assoiateimg.svg')}}" alt="" /> </div>
				<div class="col-md-6 assoiatee-right justify-content-center">
					<div class="assoiate-head">
						<h2>Let’s Complete Your Profile</h2>
						<p> Let’s set up your associate profile to help you find the right companions. This will help us
							suggest people who align with your interests and experiences. </p>
					</div>
					<div class="text-center profile-assoiate"> <img id="profilePreview"
							src="{{asset('assests/images/profileimgasssoi.svg')  }}" alt="Profile Preview"
							style="width: 120px; height: 120px; border-radius: 50%;" />
						<p> Upload a Profile Picture <br />This helps companions see who’s interested in them. </p>
						<input type="file" id="profileUpload" accept="image/*" style="display: none;" /> <button
							class="upload-btn"
							onclick="document.getElementById('profileUpload').click()">Upload</button>
					</div>
					<div class="mb-3 mt-3"> <label class="form-label">Username</label> <input type="email"
							class="form-control" placeholder="Enter username"> </div>
					<div class="accordion custom-accordion" id="accordionExample">

						<!-- Accordion Item 1 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button collapsed custom-toggle-icon" type="button"
									id="interestAccordion1">
									What are you interested in?
								</button>
							</h2>
							<div id="collapseOne1" class="accordion-collapse collapse show"
								aria-labelledby="headingOne">
								<div class="accordion-body" id="interestDisplay1">
									<!-- Selected interests will appear here -->
								</div>
							</div>
						</div>





						<!-- Modal for Accordion Item 1 -->
						<div id="interestModal1" class="modal-overlay">
							<div class="modal-contentselect">
								<button class="modal-close" id="closeInterestModal1">&times;</button>
								<h2>What Are You Interested In?</h2>
								<p>Select a few topics you genuinely enjoy. This helps us match you with better
									connections.</p>
								<div class="interest-buttons">

								@foreach($data as $hobbie)
									<button class="interest-btn" ><img
											src="uploads/hobbies/{{ $hobbie->image }}" alt="" class="modelunic-icon">
									{{ $hobbie->hobbie }}</button>
								@endforeach

								</div>
								<div class="d-flex justify-content-center confirmm-modelbtn">
									<button class="clearall-btn" id="clearallBtn1">Clear All</button>
									<button class="confirmm-selectbtn" id="saveInterestBtn1">Confirm Selection</button>
								</div>
							</div>
						</div>



						<!-- Accordion Item 2 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed custom-toggle-icon" type="button"
									id="interestAccordion2">
									List a few of your hobbies
								</button>
							</h2>
							<div id="collapseTwo2" class="accordion-collapse collapse show"
								aria-labelledby="headingTwo">
								<div class="accordion-body" id="interestDisplay2">
									<!-- Selected interests will appear here -->
								</div>
							</div>
						</div>

						<!-- Modal for Accordion Item 2 -->
						<div id="interestModal2" class="modal-overlay">
							<div class="modal-contentselect">
								<button class="modal-close" id="closeInterestModal2">&times;</button>
								
								<p>Few of your hobbies</p>
								<div class="interest-buttons">
									<button class="interest-btn" data-interest="🎮 Gaming"><img
											src="/assets/images/gamemodel.png" alt="" class="modelunic-icon">
										Gaming</button>
									<button class="interest-btn" data-interest="✈️ Travel"><img
											src="/assets/images/travelmodel.png" alt="" class="modelunic-icon">
										Travel</button>
									<button class="interest-btn" data-interest="🧘 Wellness"><img
											src="/assets/images/wellnesmodl.png" alt="" class="modelunic-icon">
										Wellness</button>
								</div>
								<div class="d-flex justify-content-center confirmm-modelbtn">
									<button class="clearall-btn" id="clearallBtn2">Clear All</button>
									<button class="confirmm-selectbtn" id="saveInterestBtn2">Confirm Selection</button>
								</div>
							</div>
						</div>


				
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed custom-toggle-icon" type="button"
									id="interestAccordion3">
								How would you describe yourself?
								</button>
							</h2>
							<div id="collapseThree3" class="accordion-collapse collapse show"
								aria-labelledby="headingThree">
								<div class="accordion-body" id="interestDisplay3">
								
								</div>
							</div>
						</div>

						
						<div id="interestModal3" class="modal-overlay">
							<div class="modal-contentselect">
								<button class="modal-close" id="closeInterestModal3">&times;</button>
								<p>How would you describe yourself?</p>
								<div class="interest-buttons">
									<button class="interest-btn" data-interest="🐶 Pets"><img
											src="/assets/images/petmodel.png" alt="" class="modelunic-icon">
										Pets</button>
									<button class="interest-btn" data-interest="🖥️ Tech"><img
											src="/assets/images/techmodel.png" alt="" class="modelunic-icon">
										Tech</button>
									<button class="interest-btn" data-interest="🎬 Movies"><img
											src="/assets/images/moviesmodel.png" alt="" class="modelunic-icon">
										Movies</button>
								</div>
							
								<div class="d-flex justify-content-center confirmm-modelbtn">
									<button class="clearall-btn" id="clearallBtn3">Clear All</button>
									<button class="confirmm-selectbtn" id="saveInterestBtn3">Confirm Selection</button>
								</div>
							</div>
						</div> 


						<!-- Accordion Item 4 -->
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingFour">
								<button class="accordion-button collapsed custom-toggle-icon" type="button"
									id="interestAccordion4">
									What kind of activities do you enjoy?
								</button>
							</h2>
							<div id="collapseFour4" class="accordion-collapse collapse show"
								aria-labelledby="headingFour">
								<div class="accordion-body" id="interestDisplay4">
									<!-- Selected interests will appear here -->
								</div>
							</div>
						</div>

						<!-- Modal for Accordion Item 4 -->
						<div id="interestModal4" class="modal-overlay">
							<div class="modal-contentselect">
								<button class="modal-close" id="closeInterestModal4">&times;</button>
							
								<p>Kind of activities do you enjoy?</p>
								<div class="interest-buttons">
									<button class="interest-btn" data-interest="🐶 Pets"><img
											src="/assets/images/petmodel.png" alt="" class="modelunic-icon">
										Pets</button>
									<button class="interest-btn" data-interest="🖥️ Tech"><img
											src="/assets/images/techmodel.png" alt="" class="modelunic-icon">
										Tech</button>
									<button class="interest-btn" data-interest="🎬 Movies"><img
											src="/assets/images/moviesmodel.png" alt="" class="modelunic-icon">
										Movies</button>
								</div>
								<div class="d-flex justify-content-center confirmm-modelbtn">
									<button class="clearall-btn" id="clearallBtn4">Clear All</button>
									<button class="confirmm-selectbtn" id="saveInterestBtn4">Confirm Selection</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
	</section> 
	
</body> <!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- select model -->

<script>
	document.addEventListener("DOMContentLoaded", function () {
		const accordions = document.querySelectorAll(".accordion-button.custom-toggle-icon");

		accordions.forEach((accordion, index) => {
			const interestModal = document.getElementById(`interestModal${index + 1}`);
			const interestAccordion = accordion;
			const closeInterestModal = interestModal.querySelector(`#closeInterestModal${index + 1}`);
			const saveInterestBtn = interestModal.querySelector(`#saveInterestBtn${index + 1}`);
			const clearallBtn = interestModal.querySelector(`#clearallBtn${index + 1}`);
			const interestButtons = interestModal.querySelectorAll(".interest-btn");
			const interestDisplay = document.getElementById(`interestDisplay${index + 1}`);

			let selectedInterests = [];

			interestAccordion.addEventListener("click", () => {
				interestModal.classList.add("show");
			});

			closeInterestModal.addEventListener("click", () => {
				interestModal.classList.remove("show");
			});

			window.addEventListener("click", (e) => {
				if (e.target === interestModal) {
					interestModal.classList.remove("show");
				}
			});

			interestButtons.forEach((btn) => {
				btn.addEventListener("click", () => {
					const interest = btn.dataset.interest;
					if (selectedInterests.includes(interest)) {
						selectedInterests = selectedInterests.filter(i => i !== interest);
						btn.classList.remove("selected");
					} else {
						selectedInterests.push(interest);
						btn.classList.add("selected");
					}
				});
			});

			function renderTags() {
				interestDisplay.innerHTML = '';
				selectedInterests.forEach(interest => {
					const tag = document.createElement("span");
					tag.className = "tag";
					tag.innerHTML = `${interest} <span class="remove-tag" data-interest="${interest}">&times;</span>`;
					interestDisplay.appendChild(tag);
				});

				const removeBtns = interestDisplay.querySelectorAll(".remove-tag");
				removeBtns.forEach(removeBtn => {
					removeBtn.addEventListener("click", () => {
						const toRemove = removeBtn.dataset.interest;
						selectedInterests = selectedInterests.filter(i => i !== toRemove);

						interestButtons.forEach(btn => {
							if (btn.dataset.interest === toRemove) {
								btn.classList.remove("selected");
							}
						});

						renderTags();
					});
				});
			}

			saveInterestBtn.addEventListener("click", () => {
				renderTags();
				interestModal.classList.remove("show");
			});

			clearallBtn.addEventListener("click", () => {
				selectedInterests = [];
				interestButtons.forEach(btn => btn.classList.remove("selected"));
			});
		});
	});
</script>








<!-- continue -->
<script>
	const modal = document.getElementById("completionModal");
	const modalCloseIcon = document.getElementById("modalCloseBtn");
	let currentStep = 1;
	const totalSteps = 3; // Update this to your total number of steps

	// Continue button click
	document.querySelectorAll(".next-btn").forEach((btn) => {
		btn.addEventListener("click", () => {
			if (currentStep < totalSteps) {
				currentStep++;
				showStep(currentStep); // You should define showStep(stepNumber)
			} else if (currentStep === totalSteps) {
				modal.classList.add("show");
			}
		});
	});

	// Close modal on × button click
	if (modalCloseIcon) {
		modalCloseIcon.addEventListener("click", () => {
			modal.classList.remove("show");
		});
	}

	// Close modal on outside click
	window.addEventListener("click", function (event) {
		if (event.target === modal) {
			modal.classList.remove("show");
		}
	});



</script> <!-- script profile upload -->
<script>
	document.getElementById('profileUpload').addEventListener('change', function (event) {
		const file = event.target.files[0];
		if (file) {
			const reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById('profilePreview').src = e.target.result;
			};
			reader.readAsDataURL(file);
		}
	});
</script>


@endsection