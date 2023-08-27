import {useEffect, useState} from "react";
import {getListUserApi} from "@/api/user.js";
import EditButton from "@/components/Buttons/EditButton.jsx";
import {useNavigate} from "react-router-dom";
import AddButton from "@/components/Buttons/AddButton.jsx";

function ListUser() {
  const [name, setName] = useState('')
  const [currentPage, setCurrentPage] = useState('')
  const [users, setUsers] = useState([])
  const navigate = useNavigate();

  const getListUser = async () => {
    const res = await getListUserApi()
    const userList = res.data.map(item => {
      return {
        ...item,
        name: item.first_name + ' ' + item.last_name,
        status: item.status === 'active' ? 'Hoạt động' : '-'
      }
    })
    setUsers(userList)
  }

  const goToEdit = (userId) => {
    navigate(`/user/edit/${userId}`)
  }
  const goToAdd = () => {
    navigate('/user/add')
  }

  // console.log(props.match)
  useEffect(() => {
    getListUser()
  }, []);

  return (
    <>
      <div className="p-5 mt-8 mx-5 bg-white">
        <div className="w-full flex justify-between">
          <AddButton onClick={goToAdd} text='Create' />
        </div>
        <div className="mt-4 bg-white p-5">
          <table className="w-full rounded-md">
            <thead>
            <tr className="bg-gray-500 text-white font-semibold">
              <th className="border py-2 w-[5%] text-current">
                #
              </th>
              <th className="border py-2 w-[20%] text-current">
                Full Name
              </th>
              <th className="border py-2 w-[20%] text-current">
                Email
              </th>
              <th className="border py-2 w-[10%] text-current">
                Status
              </th>
              <th className="border py-2 w-[5%] text-current">
                Edit
              </th>
            </tr>
            </thead>
            <tbody className="[&>tr:nth-child(odd)]:bg-[#f9f9f9]">
            {
              users.map((user, index) =>
                <tr key={user.id}>
                  <td className="border text-center py-2">{index}</td>
                  <td className="border text-center py-2">{user.name}</td>
                  <td className="border text-center py-2">{user.email}</td>
                  <td className="border text-center py-2">{user.status}</td>
                  <td className="border text-center py-2">
                    <div className="flex justify-center">
                      <EditButton onClick={() => {
                        goToEdit(user.id)
                      }} text='edit'/>
                    </div>
                  </td>
                </tr>
              )}
            </tbody>
          </table>
        </div>
      </div>
    </>
  )
}

export default ListUser
