#include <stdio.h>
#include <iostream>
using namespace std;
int t,n,i,j=0;
int a[1000001]={0};
int s[1000001]={0};
int main() {
    a[0]=1;
    a[1]=1;
    a[2]=0;
    for(i=2;i<1000001;++i)
    {
        if(a[i]==1)
        {

            s[i]=s[i-1];
            continue;

        }
        else
        {
            s[i]=s[i-1]+1;
        for(j=2*i;j<=1000001;j=j+i)
        {
            a[j]=1;
        }
        }

    }
    cin>>t;
    for(i=0;i<t;++i)
    {
        cin>>n;
        cout<<s[n]<<"\n";
    }
        return(0);
}
