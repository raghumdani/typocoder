#include<bits/stdc++.h>
using namespace std;
int main()
{
    long long t;
    cin>>t;
    while(t--)
    {
        long long n,i;
        cin>>n;
        long long prod=1;
        if(n==0)
            prod=0;
        for(i=0;n>0;i++)
        {
            prod*=(n%10);
            n/=10;
        }
        cout<<prod<<endl;
    }
    return 0;

}
