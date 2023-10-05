 
  function addFaci() {
            const formContainer = document.getElementById('formContainer2');
            const inputForm = document.createElement('div');
            inputForm.className = 'input_group2';
            inputForm.innerHTML = `

                           <div>
                                    <input type="text" class="input" name="type_of_facility" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="no_faci_units" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="faci_capacity" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="faci_rates" required>
                                </div>
                                <div>
                                    <input type="file" class="insert_img" name="faci_url" accept="image/png, image/jpg, image/jpeg, image/PNG" style="background-color: white; cursor: pointer;" required>
                                </div>
                            
            `;
            formContainer.appendChild(inputForm);
        }

        // Function to remove the last input form
        function removeFaci() {
            const formContainer = document.getElementById('formContainer2');
            const inputForms = formContainer.getElementsByClassName('input_group2');
            if (inputForms.length > 0) {
                formContainer.removeChild(inputForms[inputForms.length - 1]);
            }
        }

        // Add event listeners to the buttons
        document.getElementById('addfaci').addEventListener('click', addFaci);
        document.getElementById('removefaci').addEventListener('click', removeFaci);