#include <bits/stdc++.h>
using namespace std;
#define f(i,n) for(i=0;i<n;i++)
int main(){
  
    int t;
    
    cin>>t;
    while(t--)
    {     bool count=0;
        long long pt=4,x;
        cin>>x;
        while(pt<=x)
        {
            if(count)
            {
                pt=((pt-1)*4)+1;
                
            }
            else
            {
                pt=pt*2;
            }
            count=!count;
        }
        if(!count)
        {
            cout<<"ALICE\n";
        }
        else
        {
            cout<<"BOB\n";
        }
    }
    
    
    
    
	return 0;
}
