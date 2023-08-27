import React from 'react';

function Pagination(props) {
  const handleBack = () => {
    if(props.pageCurrent > 1){
      props.onBack(props.pageCurrent - 1)
    }
  }

  const handleNext = () => {
    if(props.pageCurrent < props.pageCurrent){
      props.onNext(props.pageCurrent + 1)
    }
  }

  return (
    <>
      <div className="w-full flex justify-center mt-3">
        <div className="px-2 py-1 bg-[#ddd] rounded cursor-pointer hover:opacity-60" onClick={handleBack}>Prev</div>
        {(props.pageCurrent - 1 > 0) &&
          <div className="px-2 py-1 bg-[#ddd] rounded ml-1 cursor-pointer hover:opacity-60" onClick={handleBack}>
            {props.pageCurrent - 1}
          </div>
        }
        <div className="px-2 py-1 bg-[#2a8ab1] text-white rounded ml-1 cursor-pointer hover:opacity-60">
          { props.pageCurrent }
        </div>
        {(props.pageCurrent + 1 <= props.totalPage) &&
          <div className="px-2 py-1 bg-[#ddd] rounded ml-1 cursor-pointer hover:opacity-60" onClick={handleBack}>
            {props.pageCurrent - 1}
          </div>
        }
        <div className="px-2 py-1 bg-[#ddd] rounded cursor-pointer hover:opacity-60" onClick={handleNext}>Next</div>
      </div>
    </>
  );
}

export default Pagination
