#include <iostream>
using namespace std;
#define mod 1000000007

int search(int b[],int k,int low,int high)
{
    if(b[low]==b[k])
    {
        return 0;
    }
    else if(low>high)
        return 1;
    else return search(b,k,low+1,high);
}
int main()
{
    int i,j,n,q;
    cin>>n;
    int a[n];
    for(i=0;i<n;i++)
        cin>>a[i];
    cin>>q;
    for(j=0;j<q;j++)
    {
        int l,r;
        cin>>l>>r;
        l--;
        r--;
        int nf=r-l;
        long long int pro=1;
        //int b[nf];
       // if(l==r)
       //     pro=a[l];
        for(int k=0;k<nf;k++)
        {
        //    b[k]=a[l+k];
            if(search(a,l+k,l,l+k-1))
                pro=((pro%mod)*(a[l+k]%mod))%mod;
        }
        cout<<pro<<endl;
    }
	return 0;
}