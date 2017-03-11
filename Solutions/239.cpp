#include <iostream.h> 
#include<math.h>
int main() {
    int t,n;
    cin>>t;
    for(int i=0;i<t;i++)
    {int c=0;
        cin>>n;
        for(int j=2;j<=sqrt(n);j++)
        {
            if(n%j==0)
            {
                c++;
                break;
            }
        }
            if(c)
            cout<<"NO\n";
            else
            cout<<"YES\n";
        
        
    }
    
	return(0);
}