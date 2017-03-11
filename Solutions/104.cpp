#include <stdio.h>
#include <iostream>
using namespace std;
int t,n,i,j=0;
int a[100001]={0};
int main() {
    a[0]=1;
    a[1]=1;
    a[2]=0;
    for(i=2;i<100001;++i)
    {   if(a[i]==1)
        break;
        else

        for(j=2*i;j<100001;j=j+i)
        {
            a[j]=1;
        }

    }
    cin>>t;
    for(i=0;i<t;++i)
    {
        cin>>n;
        if(a[n]==0)
        cout<<"YES\n";
        else cout<<"NO\n";

    }
        return(0);
}
