import {useState} from "react";
import {createUserApi} from "@/api/user.js";
import {useNavigate} from "react-router-dom";

function AddUser() {
  const [firstName, setFirstName] = useState('')
  const [lastName, setLastName] = useState('')
  const [email, setEmail] = useState('')
  const [messageError, setMessageError] = useState('')
  const [selectedOption, setSelectedOption] = useState('active')
  const navigate = useNavigate()

  const handleSelectChange = (event) => {
    setSelectedOption(event.target.value);
  };

  const handleFirstNameChange = (event) => {
    setFirstName(event.target.value);
  };

  const handleLastNameChange = (event) => {
    setLastName(event.target.value);
  };

  const handleEmailChange = (event) => {
    setEmail(event.target.value);
  };

  const handleSubmit = async (e) => {
    e.preventDefault()
    try {
      const formData = {
        first_name: firstName,
        last_name: lastName,
        email,
        status: selectedOption,
      }
      const res = await createUserApi(formData)
      navigate(`/user/list`)
    } catch (error) {
      if (error.hasOwnProperty('message')) {
        setMessageError(error.message)
      }
      if (error.hasOwnProperty('data')) {
        setMessageError(error.data.title)
      }
    }
  }

  return (
    <>
      <div className="p-5 mt-8 mx-5 bg-white">
        <div className="w-[650px] mt-5 ml-5 bg-white border border-t-[2px] border-[#e7eaec]">
          <div className="py-4 px-3 border-b border-[#e7eaec] text-md text-gray-700">
            Edit User
          </div>
          <form onSubmit={handleSubmit}>
            <div className="py-1 mx-3">
              <label htmlFor="first-name" className="block py-2 font-bold text-lg">
                <span>First Nane</span>
              </label>
              <input type="text" name="first-name" placeholder="first name" value={firstName} onChange={handleFirstNameChange}
                     className="w-full h-10 px-3 text-base text-gray-700 placeholder-gray-400 border border-gray-400 focus:border-[#8ddd8d] outline-none"
              />
            </div>
            <div className="py-1 mx-3">
              <label htmlFor="last-name" className="block py-2 font-bold text-lg">
                <span>Last Nane</span>
              </label>
              <input type="text" name="last-name" placeholder="last name" value={lastName} onChange={handleLastNameChange}
                     className="w-full h-10 px-3 text-base text-gray-700 placeholder-gray-400 border border-gray-400 focus:border-[#8ddd8d] outline-none"
              />
            </div>
            <div className="py-1 mx-3">
              <label htmlFor="email" className="block py-2 font-bold text-lg">
                <span>Email</span>
              </label>
              <input type="text" name="email" placeholder="email" value={email} onChange={handleEmailChange}
                     className="w-full h-10 px-3 text-base text-gray-700 placeholder-gray-400 border border-gray-400 focus:border-[#8ddd8d] outline-none"
              />
            </div>
            <div className="py-1 mx-3">
              <label htmlFor="status" className="block py-2 font-bold text-lg">
                <span>Status</span>
              </label>
              <select name="status" value={selectedOption}
                      className="w-full h-10 px-3 text-base text-gray-700 placeholder-gray-400 border border-gray-400 focus:border-[#8ddd8d] outline-none"
                      onChange={handleSelectChange}
              >
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
              </select>
            </div>
            <div className="h-3 p-1">
              <span className="text-red-500 text-base">{!!messageError ? messageError : ''}</span>
            </div>
            <div className="flex justify-end border-t border-[#e7eaec] mt-4 p-2">

              <input className="mt-3 p-2 text-base font-bold text-white bg-[#1ab394] hover:bg-[#18a689] cursor-pointer rounded-md"
                     type="submit" value="Create" />
            </div>
          </form>
        </div>
      </div>
    </>
  )
}

export default AddUser
